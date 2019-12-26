<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'phone' => 'required|numeric|unique:users|min:11|max:11',
            'password' => 'required|confirmed|min:6',
            'captcha' => 'required|captcha',
        ],[
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ]);
        return;
    }
}
