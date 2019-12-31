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
    public function store(OrderRequest $request){
        $user  =\Auth::id();
        //获取赠送金额
       $price=$request->price;
       //查询金额对应的赠送金额
       $rult=Product::where('interval_price','<=',$price)
                     ->OrderBy('interval_price','desc')
                     ->get()
                     ->first()
                     ->toArray();
        $give_price=$rult['give_price'];

        //创建一个订单
        $order=new Order([
            'price'=>$price,
            'give_price'=>$give_price,
            'total_amount'=>$price+$give_price,
        ]);
         // 订单关联到当前用户
        $order->user()->associate($user);
         // 写入数据库
         $order->save();

         //返回订单数据
        $this->dispatch(new CloseOrder($order, config('app.order_ttl')));

        return $order;
    }


    public function payByAlipay(Order $order){

    }
}
