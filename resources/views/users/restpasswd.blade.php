<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>重置密码</title>

    <link rel="stylesheet" href="/css/userStyle.css">
</head>

<body>

    <div class="reset-interface wrap">
        <div class="logo-container">
            <a href="" class="logo">
                <img src="https://nuoren-1300309221.cos.ap-guangzhou.myqcloud.com/prod/eee774c82156000.png" alt=""
                    class="logo-img">
            </a>
        </div>

        <div class="reset-container content">
            <div class="banner">
                <img src="https://nuoren-1300309221.cos.ap-guangzhou.myqcloud.com/prod/ee0aedfa3156000.png" alt=""
                    class="banner-img">
            </div>

            <div class="reset validation-area">
                <div class="h2">重置密码</div>

                <div class="userCount input-wrap">
                    <input type="text" name="userCount" id="userCount" placeholder="请输入手机号码" />
                    <p class="userCount-check check">

                    </p>
                </div>
                <div class="verification input-wrap">
                    <input type="text" name="verification" id="verification" placeholder="请输入验证码" />
                    <button id="getVerification">获取验证码</button>

                    <div class="imgVer">
                        <div class="imgVer-img-wrap">
                            <img src="" alt="" class="imgVer-img">
                        </div>
                        <div class="imgVer-ver-wrap">
                            <input type="text" class="imgVer-ver" placeholder="图形验证码" />
                            <input type="hidden" name="captcha_key" class="userID" value="" />

                            <button id="post-imgVer-btn" class="post-imgVer-btn">确定</button>
                        </div>
                        <div class="imgVer-ver-check"></div>
                    </div>

                    <p class="verification-check check">
                        <!-- 验证码错误 -->
                    </p>
                </div>
                <div class="userPass input-wrap">
                    <input type="password" name="userPass" id="userPass" placeholder="请输入密码" />
                    <p class="userPass-check check">
                        <!-- 与原密码重复 -->
                    </p>
                </div>
                <input type="hidden" name="verificationID" id="verificationID" value="" />
                <button class="btn" id="submitBtn">提交</button>
                <div class="reset-footer footer">
                    <a href="" class="resetPass">我又想起来了</a>
                </div>

            </div>
        </div>
    </div>

    <script src="/js/jquery-1.7.1.min.js"></script>
    <script src="/js/commen.js"></script>
    {{-- <script src="/js/userCountCheck.js"></script> --}}
    <script src="/js/userPassCheck-strict.js"></script>
    <script src="/js/resetPWD.js"></script>
</body>

</html>