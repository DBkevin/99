<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    //
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function restpasswd(){
        return view('users.restpasswd');
    }
    public function uppasswd(UserRequest $request){
        $verifyData=\Cache::get($request->verification_key);
        if(!$verifyData){
            return  back()->withErrors('验证码已失效');
        }
        if(!hash_equals($verifyData['code'],$request->verification_code)){
            return  back()->withErrors('验证错误');
        }
        $user=User::update([
            'password'=>bcrypt($request->password),
        ]);
        //清楚验证码缓存
        \Cache::forget($request->verification_key);
        return;
    }
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);
        if (!$verifyData) {
            return back()->withErrors('验证码已失效');
        }
        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            return back()->withErrors('验证码错误');
        }
        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password),
            'qq'=>$request['qq'],
        ]);
        // 清除验证码缓存
        \Cache::forget($request->verification_key);
        return;
    }
}
