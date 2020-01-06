<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Userpriceinfo;
class PostController extends Controller
{
    //
    public function show(User $user,Request $request){
        $orders=Order::query()
                ->where('user_id',$request->user()->id)
                ->orderBy('created_at','desc')
                ->paginate(20);
        $products=Product::all();
        $userPrices=Userpriceinfo::where('users_id',$request->user()->id)->get();
        return view('users.post',compact(['products','orders','userPrices']));
    }
    
    
}
