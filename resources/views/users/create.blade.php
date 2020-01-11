<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户注册</title>

    <link rel="stylesheet" href="/css/userStyle.css">
</head>

<body>

    <div class="register-interface wrap">
        <div class="logo-container">
            <a href="/" class="logo">
                <img src="/images/logo.png" alt="" class="logo-img">
            </a>
        </div>

        <form action="{{route('users.store')}}" method="post">
            @csrf

            <div class="register-container content">
                <div class="banner register-banner">
                    <img src="/images/signup.png" alt="" class="banner-img">

                    <p class="register-ban">新注册用户联系客服免费领取500流量币体验</p>
                </div>

                <div class="register-box validation-area">
                    <div class="h2 register">用户注册</div>

                    <div class="userName input-wrap">
                        <input type="text" name="name" id="userName" placeholder="请输入会员名称" />
                        <p class="userName-check check">请输入中文字符，不含空格，长度2-4</p>
                        @if (count($errors) > 0)
                        <li>{{ $errors->first('name')}}</li>
                        @endif
                    </div>

                    <div class="userCount input-wrap">
                        <input type="text" name="phone" id="userCount" placeholder="请输入手机号码" />
                        <p class="userCount-check check"></p>
                        @if (count($errors) > 0)
                        <li>{{ $errors->first('phone')}}</li>
                        @endif
                    </div>
                    <div class="verification input-wrap">
                        <input type="text" name="verification_code" id="verification" placeholder="请输入验证码" />
                        <button type="button" id="getVerification">获取验证码</button>

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

                        <p class="verification-check check"></p>
                        @if (count($errors) > 0)
                        <li>{{ $errors->first('verification_code')}}</li>
                        @endif
                        <li>{{ $errors->verification_code->first(0) }}</li>
                    </div>
                    <div class="userPass input-wrap">
                        <input type="password" name="password" id="userPass" placeholder="请输入密码" />
                        <p class="userPass-check check">
                            长度8-20个字符，不含空格，非9位以下纯数字。
                        </p>
                        @if (count($errors) > 0)
                        <li>{{ $errors->first('password')}}</li>
                        @endif
                    </div>
                    <div class="userPassAgain input-wrap">
                        <input type="password" name="userPass" id="userPassAgain" placeholder="请再次输入密码" />
                        <p class="userPassAgain-check check"></p>
                    </div>
                    <input type="hidden" name="pid" id="pid" value=""/>
                    <div class="QQNum input-wrap">
                        <input type="text" name="qq" class="QQNum" id="QQ" placeholder="请输入QQ号码" />
                        <p class="QQNum-check check"></p>
                    </div>
                    <input type="hidden" name="verification_key" id="verificationID" value="" />
                    <button type="submit" class="btn" id="registerBtn">注册</button>
                    <div class="register-footer footer">
                        <a href="/login" class="" id="hasCount">我已有账号，立即登录</a>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <script src="/js/jquery-1.7.1.min.js"></script>
    <script src="/js/userPassCheck-strict.js"></script>
    <script src="/js/userPassCheckAgain.js"></script>
    <script src="/js/QQNumCheck.js"></script>
    <script src="/js/commen.js"></script>
    <script src="/js/signup.js"></script>
    <script>
        window.onload=getPid();
        function getPid(){
            //获取地址
            var url=window.location.href;
            //获取参数
            var arr=url.split('?');
            //判断是否有值
            if(arr.length ==1){
                return false;
            }
            //拆解字符串，转成数组
            var value_arr=arr[1].split('&');
            var tmp_arr=[];
            for (index = 0; index < value_arr.length; index++) {
                var key_val=value_arr[index].split('=');//按=号拆解为数组
                tmp_arr[key_val[0]]=key_val[1];
            }
            if(tmp_arr["pid"]!=0){
                //获取inpu name 为pid的赋值
                $('#pid').val(tmp_arr['pid']);
            }

        }

    </script>
</body>

</html>