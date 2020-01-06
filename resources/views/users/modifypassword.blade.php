@extends('layouts.user')
@section('title', '拼多多任务发布')
@section('styles')
<style>
    .fl {
        float: left;
    }

    .p115 {
        padding-left: 15px;
    }

    .pr15 {
        padding-right: 15px;
    }

    .pd20 {
        padding-bottom: 20px;
    }

    .modify-password {
        padding-top: 10px;
    }

    .title-box {
        padding: 17px 0 17px 5px;
        border-bottom: 1px solid #ccc;
        margin-bottom: 25px;
    }

    .title {
        color: #1799ea;
        font-size: 20px;
    }

    .modify-password .content-box div {
        height: 35px;
        line-height: 35px;
    }

    .modify-password .content-box div .title {
        font-size: 16px;
        color: #666;
        margin-right: 15px;
        width: 93px;
        text-align: right;
    }

    .index-font-color {
        color: #1799ea;
    }

    .mt20 {
        margin-top: 20px;
    }

    .modify-password .content-box div input.code {
        width: 230px;
    }

    .modify-password .content-box div input.inputStyle {
        box-sizing: border-box;
    }

    .inputStyle {
        border: 1px solid #ccc;
        height: 35px;
        background: #fff;
        border-radius: 2px;
    }

    .modify-password .content-box div button.code-btn {
        background-color: #1799ea;
        font-size: 16px;
        width: 140px;
        padding: 0 20px;
        border-radius: 5px;
        color: #fff;
        height: 35px;
        line-height: 35px;
        cursor: pointer;
        border: none;
        outline: none;
    }

    .modify-password .content-box div input.password {
        width: 380px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        height: 35px;
        background-color: #fff;
        border-radius: 2px;
    }

    .modify-password .content-box div.button-box {
        height: 50px;
        line-height: 50px;
    }

    .mt25 {
        margin-top: 25px;
    }

    .modify-password .content-box div.button-box button {
        width: 160px;
        font-size: 20px;
        height: 50px;
        background-color: #1799ea;
        padding: 0 20px;
        border-radius: 5px;
        color: #fff;
        line-height: 35px;
        cursor: pointer;
        border: none;
    }

    .modify-password .content-box .verification {
        width: 447px;
        position: relative;
    }

    #getVerification {
        position: absolute;
        top: 0;
        right: 0;

        width: 110px;
        height: 35px;
        font-size: 14px;
        color: #fff;
        background-color: #1d87f7;

        border-radius: 2px;
        border: none;
        outline: none;
    }

    .modify-password .content-box .imgVer {
        display: none;

        position: absolute;
        top: -120px;
        right: -37px;
        margin-bottom: 12px;

        padding: 8px 0 3px;
        width: 180px;
        height: 95px;
        background-color: #fff;
        border: 1px solid #ebeef5;
        border-radius: 4px;
        box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
    }

    .modify-password .content-box .imgVer::after {
        content: '';
        display: block;
        position: absolute;
        left: 50%;
        bottom: -12px;
        transform: translateX(-50%);
        border: 6px solid transparent;
        border-top-color: #fff;
    }

    .modify-password .content-box .imgVer-img-wrap,
    .modify-password .content-box .imgVer-ver-wrap {
        width: 100%;
    }

    .modify-password .content-box .imgVer-img-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 46px
    }

    .modify-password .content-box .imgVer-img {
        height: 40px;
    }

    .modify-password .content-box .imgVer-ver-wrap {
        position: relative;

        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .modify-password .content-box .imgVer-ver {
        width: 150px;
        height: 31px;
        padding-left: 10px;
        border: 1px solid #dcdfe6;
        border-radius: 4px;
        color: #606266;
        background-color: #fff;
        outline: none;
    }

    .modify-password .content-box .post-imgVer-btn {
        position: absolute;
        top: 0;
        right: 10px;
        width: 50px;
        height: 34px;
        border: none;
        border-radius: 3px;
        background-color: #e6a23c;
        color: #fff;
        outline: none;
    }

    .modify-password .content-box .imgVer-ver-check {
        padding-left: 26px;
        width: 154px;
        height: 18px;
        line-height: 18px;
        font-size: 12px;
        color: #f00;
    }

    #submitBtn {
        width: 120px;
        height: 50px;
        line-height: 50px;
        color: #fff;
        background-color: #1d87f7;
        border: none;
        border-radius: 5px;
        font-size: 18px;

        margin-left: 108px;
        margin-top: 20px;
    }
</style>
@stop
@section('content')
<div class="content">
    <div class="p115 pr15">
        <div class="pd20 modify-password">
            <div class="title-box">
                <p class="title">
                    修改密码
                </p>
            </div>
            <div class="content-box">
                <form id="myForm" action="{{route('patchrestpasswd')}}" method="post">
                    @csrf
                    {{ method_field('PATCH')}}
                    <div class="clearfix">
                        <div class="title fl">手机号码</div>
                        <div class="mobile index-font-color">
                            {{Auth::User()->phone}}
                            <input type="hidden" name="phone" id="userCount" value="{{Auth::User()->phone}}" />
                        </div>
                    </div>
                    <div class="verification clearfix mt20">
                        <span class="title fl">验证码</span>
                        <input id="verification" type="text" name="verification_code" autocomplete="new-password"
                            placeholder="请输入验证码" class="inputStyle code fl mr10">
                        <button id="getVerification" class="fl code-btn">获取验证码</button>

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
                    </div>
                    <div class="clearfix mt20">
                        <span class="title fl">新密码</span>
                        <input id="userPass" type="password" name="password" autocomplete="new-password"
                            placeholder="请输入密码" class="inputStyle password fl" aria-autocomplete="list">
                    </div>
                    <p class="userPass-check"
                        style="height: 24px; line-height: 24px; padding-left: 108px; margin-top: 5px; color: rgb(153, 153, 153);">
                        长度8-20个字符，不含空格。
                    </p>
                    <input type="hidden" name="verification_key" id="verificationID" value="" />
                    <input type="hidden" name="_token" id="CSRF_info" value="{{ csrf_token() }}" />
                    <button type="submit" class="btn" id="submitBtn">确认</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="/js/commen.js"></script>
<script type="text/javascript">
    getVerification.on('click', function () {
        phoneNum = $.trim(userCount.val());
        console.log('即将发送ajax请求');
        verification.val('');
        sendResetPwdAjax(phoneNum);

        return false;
    });
    function sendResetPwdAjax(phoneNum) {
        $.ajax({
            url: baseHttp + 'restpasswdcaptchas',
            type: 'POST',
            dataType: 'json',
            data: {
                'phone': phoneNum,
            },
            header: {
                'Accept': 'application/json',
            },
            success: function (resetPwdSucData) {
                fillImgVer(resetPwdSucData);
            },
            error: function (resetPwdErrData) {
                let errdata = JSON.parse(resetPwdErrData.responseText);
                rewritePhoneNum(userCount, userCountCheck, errdata["errors"]["phone"][0]);
            }
        });
    }

    postImgVerBtn.on('click', function () {
        var deadline = convertTimeFormat(imgVer_data['expired_at']);
        var nowTime = getCurrentTime();
        if (nowTime > deadline) {
            imgVerCheck.text('验证码已失效');
            sendResetPwdAjax(phoneNum);
        } else {
            sendImgVerAjax(userID.val(), imgVer_ver.val());
        }
        return false;
    });
    function sendImgVerAjax(key, ver) {
        $.ajax({
            url: baseHttp + 'verificationCodes',
            type: 'POST',
            dataType: 'json',
            data: {
                'captcha_key': key,
                'captcha_code': ver
            },
            header: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            success: function (verSucData) {
                fillVerificationID(verSucData);
                getVerification.css('background', '#ccc').text('验证码已发送').removeAttr('type');
            },
            error: function (verErrData) {
                let errdata = JSON.parse(verErrData.responseText);
                imgVerCheck.text(errdata['message']);
                setTimeout(function () {
                    sendResetPwdAjax(phoneNum);
                    imgVerCheck.empty();
                    imgVer_ver.val('').focus();
                }, 500);
            }
        });
    }
    userPass.on('input', function () {
        clearTimeout(checkPWD);
        checkPWD = setTimeout(function () {
            pwd = userPass.val();
            if (judgePwd(pwd)) {
                userPassCheck.text('密码格式正确').css('color', 'rgb(0, 160, 0)');
            } else {
                userPassCheck.text('密码长度8-20个字符，不含空格，非9位以下纯数字').css('color', '#999');
            }
        }, 200);
    });

    submitBtn.on('click', function () {
        // console.log(userPass.val(), verification.val(), userCount.val());
        if (userPass.val() == '') {
            console.log('userPass'+userPass.val());
            userPassCheck.text('密码不能为空').css('color','#f00');
            return false;
        } else if (verification.val() == '') {
            verificationCheck.text('验证码不能为空');
            return false;
        } else {
            var deadline = convertTimeFormat(ver_data['expired_at']);
            var nowTime = getCurrentTime();
            if (nowTime > deadline) {
                verificationCheck.text('验证码已失效');
                sendResetPwdAjax(phoneNum);
                return false;
            } else {
                if (judgeVerCode(verification.val())) {
                    console.log('验证码正确');
                    // submitAjax($('#CSRF_info').val());
                    
                    return true;
                } else {
                    getVerification.attr('type', 'button').css('background', '#1d87f7').text('获取验证码');
                    return false;
                }
            }
        }
    });

    
    function submitAjax(csrf,num,ver,pwd,key) {
        $.ajax({
            url: baseHttp + 'restpasswdcaptchas', //提交的地址  
            type: "POST",   //提交的方法
            dataType: 'json',
            header: {
                'X-CSRF-TOKEN' : csrf,
                'phone':num,
                'verification_code':ver,
                'password':pwd,
                'verification_key':key,
            },
            data: {
                _method:"PUT"
            },
            error: function(request) {
                alert("Connection error");  
            },  
            success: function(data) {
                alert('密码重置成功'); 
            }  
        });
    }
</script>
@stop