<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpPasswdRequest extends FormRequest
{
   
    /**
     * 重置密码，手机验证
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => [ 'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/',
                'exists:users,phone',
            ],
            'password' => 'required|alpha_dash|min:6',
            'verification_key' => 'required|string',
            'verification_code' => 'required|string',
        ];
    }
    public function attributes()
    {
        return [
            'verification_key' => '短信验证码 key',
            'verification_code' => '短信验证码',
        ];
    }
}
