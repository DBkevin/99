<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpPasswdRequest;
use App\Http\Requests\LoginRequest;

class UsersController extends Controller
{
    //

    public function show()
    {
        $user=Auth::user();
        $this->authorize('isme', $user);//确定是用户本人
        return view('users.show', compact('user'));
    }
    //重置密码页面
    public function restpasswd(){
        return view('users.restpasswd');
    }
    //更新密码
    public function uppasswd(UpPasswdRequest $request){
        $verifyData=\Cache::get($request->verification_key);
        if(!$verifyData){
            return  back()->withErrors('验证码已失效');
        }
        if(!hash_equals($verifyData['code'],$request->verification_code)){
            return  back()->withErrors('验证错误','verification_code');
        }
        $user=User::where('phone',$verifyData['phone'])->first();
        $user->password=bcrypt($request->password);
        $user->update();
         return redirect()->route('users.show', [Auth::user()]);
        //清楚验证码缓存
        \Cache::forget($request->verification_key);
        return;
    }
    //显示注册页面
    public function create()
    {
        return view('users.create');
    }
    //注册
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
    //显示登陆页面
    public function showLoginForm(){
        return view('users.login');
    }
    public function login(LoginRequest $request){
        $phone=$request->phone;
        $passWd=$request->password;
        if(Auth::attempt(['phone'=>$phone,'password'=>$passWd])){
                // 登录成功后的相关操作
            session()->flash('success', '欢迎回来！');
           return redirect()->route('users.show', [Auth::user()]);
        }else{
            // 登录失败后的相关操作
           session()->flash('danger', '很抱歉，您的电话和密码不匹配');
           return redirect()->back()->withInput();
        }
    }
}
