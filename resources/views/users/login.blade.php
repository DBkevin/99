<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>

    <link rel="stylesheet" href="/css/userStyle.css">

</head>

<body>

    <div class="login-interface wrap">
        <div class="logo-container">
            <a href="/" class="logo">
                <img src="/images/logo.png" alt="" class="logo-img">
            </a>
        </div>

        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="login-container content">
                <div class="login-banner banner">
                    <img src="/images/login&reset.png" alt="" class="login-banner-img">
                </div>

                <div class="login validation-area">
                    <div class="h2">用户登录</div>

                    <div class="userCount input-wrap">
                        <input type="text" name="phone" id="userCount" placeholder="请输入手机号码" />
                        <p class="userCount-check check"></p>
                        @if (count($errors) > 0)
                        <li>{{ $errors->first('phone')}}</li>
                        @endif
                    </div>
                    <div class="userPass input-wrap">
                        <input type="password" name="password" id="userPass" placeholder="请输入密码" />
                        <p class="userPass-check check"></p>
                        @if (count($errors) > 0)
                        <li>{{ $errors->first('password')}}</li>
                        @endif
                    </div>
                    <button type="submit" id="loginBtn" class="loginBtn btn">登录</button>
                    <div class="login-footer footer">
                        <a href="/restpasswd" class="resetPass">忘记密码</a>
                        <span>
                            还没账号，<a href="/signup" class="register">立即注册</a>
                        </span>
                    </div>

                </div>
            </div>
        </form>
    </div>


    <script src="/js/jquery-1.7.1.min.js"></script>
    <script src="/js/commen.js"></script>
    <script src="/js/login.js"></script>
    <script src="/js/userCountCheck.js"></script>
    <script src="/js/userPassCheck.js"></script>
</body>

</html>