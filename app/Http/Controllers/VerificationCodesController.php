<?php

namespace App\Http\Controllers;

use IllUminate\Support\Str;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use App\Http\Requests\VerificationCodeRequest;
use Illuminate\Auth\AuthenticationException;

class VerificationCodesController extends Controller
{



    public function store(EasySms $easySms, VerificationCodeRequest $request)
    {
        $captchaData = \Cache::get($request->captcha_key);
        if (!$captchaData) {
            abort(403, '图片验证码已失效');
        }
        if (!hash_equals($captchaData['code'], $request->captcha_code)) {
            // 验证错误就清除缓存
            \Cache::forget($request->captcha_key);
            throw new AuthenticationException('验证码错误');
        }
        $phone = $captchaData['phone'];
        //如果是开发模式，不真实发送信息
        if (!app()->environment('production')) {
            $code = '1234';
        } else {
            // 生成4位随机数，左侧补0
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
            try {
                $result = $easySms->send($phone, [
                    'template' => config('easysms.gateways.aliyun.templates.register'),
                    'data' => [
                        'code' => $code
                    ],
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $message = $exception->getException('aliyun')->getMessage();
                abort(500, $message ?: '短信发送异常');
            }
        }
        $key = 'verificationCode_' . Str::random(15);
        $expiredAt = now()->addMinutes(15);
        // 缓存验证码 15 分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        return response()->json([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }

    
}
