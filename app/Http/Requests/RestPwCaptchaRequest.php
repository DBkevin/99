<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestPwCaptchaRequest extends FormRequest
{
    

    public function rules()
    {
        return [
            'phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/',
                'exists:users,phone',//必须数据库中有这个手机号才可以通过
            ]
        ];
    }
}
