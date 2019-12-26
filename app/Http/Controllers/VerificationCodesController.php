<?php

namespace App\Http\Controllers;

use IllUminate\Support\Str;
use Overtrue\EasySms\EasySms;
use App\Http\Requests\VerificationCodeRequest;

class VerificationCodesController extends Controller
{

  
    
    public function store(EasySms $easySms,VerificationCodeRequest $request){
         return response()->json(['test_message' => 'store verification code']);
        /*
        $phone = $request->phone;
          // 生成4位随机数，左侧补0
        $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
        try{
            $result = $easySms->send($phone, [
                'template' => config('easysms.gateways.aliyun.templates.register'),
                'data' => [
                    'code' => $code
                ],
            ]);
        }catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
            $message = $exception->getException('aliyun')->getMessage();
            abort(500, $message ?: '短信发送异常');
        }
        $key = 'verificationCode_'.Str::random(15);
        $expiredAt = now()->addMinutes(5);
          // 缓存验证码 5 分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
         return response()->json([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
        */
        
    }
   
}
