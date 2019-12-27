<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaptchaRequest;
use Illuminate\Support\Str;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests\RestPwCaptchaRequest;

class CaptchasController extends Controller
{
    public function store(CaptchaRequest $request,CaptchaBuilder $captchaBuilder){
        $key='captcha-'.Str::random(15);
        $phone=$request->phone;
        $captcha=$captchaBuilder->build();
        $expiredAt=now()->addMinutes(2);
        \Cache::put($key,['phone'=>$phone,'code'=>$captcha->getPhrase()],$expiredAt);
        $result=[
            'captcha_key'=>$key,
            'expired_at'=>$expiredAt->toDateTimeString(),
            'captcha_image_content'=>$captcha->inline()
        ];

        return response()->json($result)->setStatusCode(201);

    }
    public function resetPasswd(RestPwCaptchaRequest $request,CaptchaBuilder $captchaBuilder){
         $key='Rest-captcha-'.Str::random(11);
         $phone=$request->phone;
         $captcha=$captchaBuilder->build();
         $expiredAt=now()->addMinutes(2);
        \Cache::put($key,['phone'=>$phone,'code'=>$captcha->getPhrase()],$expiredAt);
        $result=[
            'captcha_key'=>$key,
            'expired_at'=>$expiredAt->toDateTimeString(),
            'caotcha_image_content'=>$captcha->inline(),
        ];
        return response()->json($result)->setStatusCode(201);

    }
}
