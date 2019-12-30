<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;
use App\Models\Product;
class PostController extends Controller
{
    //
    public function show(User $user){
        $products=Product::all();
        return view('users.post',compact(['user','products']));
    }
}
