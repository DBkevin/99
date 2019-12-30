<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
class OrderController extends Controller
{
 
    //
    public function store(OrderRequest $request)
        $user  =\AUth::id();
        //获取赠送金额
        $give_price=$request->$post_id;
        //金额大于指定的金额
        if($give_price){
            $sult=Product::query()->where('id',$post_id)->get();
        
            
        }
        //创建一个订单
        $order=new Order([

        ])

    }
}
