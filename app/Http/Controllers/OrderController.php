<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use App\Jobs\CloseOrder;
use App\Exceptions\InvalidRequestException;

class OrderController extends Controller
{

    //
    public function store(OrderRequest $request)
    {
        $user  = \Auth::id();
        //获取赠送金额
        $price = $request->price;
        $min_prica = Product::query()->OrderBy('interval_price', 'asc')->get()->first()->toArray();
        if ($price < $min_prica['interval_price']) {
            //小于最低赠送金额，直接赠送0
            $give_price = 0.00;
        } else {
            //查询金额对应的赠送金额
            $rult = Product::where('interval_price', '<=', $price)
                ->OrderBy('interval_price', 'desc')
                ->get()
                ->first()
                ->toArray();
            $give_price = $rult['give_price'];
        }

        //创建一个订单
        $order = new Order([
            'price' => $price,
            'give_price' => $give_price,
            'total_amount' => $price + $give_price,
        ]);
        // 订单关联到当前用户
        $order->user()->associate($user);
        // 写入数据库
        $order->save();

        //返回订单数据
        $this->dispatch(new CloseOrder($order, config('app.order_ttl')));

        return redirect()->route('payment.alipay', $order->id);
    }


    public function payByAlipay(Order $order)
    {
        //判断是否属于当前用户
        $this->authorize("isorder", $order);
        // 订单已支付或者已关闭
        if ($order->paid_at || $order->closed) {
            throw new InvalidRequestException('订单状态不正确');
        }
        // 调用支付宝的网页支付
        return app('alipay')->web([
            'out_trade_no' => $order->no, // 订单编号，需保证在商户端不重复
            'total_amount' => $order->price, // 订单金额，单位元，支持小数点后两位
            'subject'      => "支付 {{config('app.name')}}的订单：" . $order->no, // 订单标题
        ]);
    }

    // 服务器端回调
    public function alipayNotify()
    {   // 校验输入参数
        $data = app('alipay')->verify();
        // 如果订单状态不是成功或者结束，则不走后续的逻辑
        // 所有交易状态：https://docs.open.alipay.com/59/103672
        if (!in_array($data->trade_status, ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
            return app('alipay')->success();
        }
        // $data->out_trade_no 流水号
        $order = Order::where('no', $data->out_trade_no)->first();
        if (!$order) {
            return 'fail'; // 不存在通知阿里失败
        }
        // 如果这笔订单的状态已经是已支付
        if ($order->paid_at) {
            // 返回数据给支付宝
            return app('alipay')->success();
        }
        $order->update([
            'paid_at'        => Carbon::now(), // 支付时间
            'payment_method' => 'alipay', // 支付方式
            'payment_no'     => $data->trade_no, // 支付宝订单号
        ]);
        /**
         * 根据具体业务决定是否开始事务
         */
        //确定付款开始计算金额
        $user_tokens=(int)$order->total_amout * config('app.tokensPH'); //apptokensPH是固定比例，1元等100代币就在app.php新增一个tokensPH=>100；
        $user=User::where('id',$order->user_id)->first();
        //更新用户表数据
        $user->update([
            'tokens'=>$user_tokens,
            'total_price'=>$user->price+$order->price,
        ]);

        return app('alipay')->success(); //通知alipay收到
        \Log::debug('Alipay notify', $data->all());
    }

    public function alipayReturn()
    {
        try {
            app('alipay')->verify();
        } catch (\Exception $e) {
            return view('pages.error', ['msg' => '数据不正确']);
        }
        return view('pages.success', ['msg' => '付款成功']);
    }
}
