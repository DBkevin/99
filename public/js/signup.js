userName.on('input', function () {
    userNameCheck.empty();
});
userCount.on('input', function () {
    userCountCheck.empty();
});
verification.on('input', function () {
    verificationCheck.empty();
});
userPass.on('input', function () {
    userPassCheck.text('密码长度8-20个字符，不含空格，非9位以下纯数字').css('color', '#999');
});

userName.on('blur', function () {
    var reg = /[\u4e00-\u9fa5]{2,4}/; 
    if (!reg.test(userName.val())) {
        userNameCheck.text('请输入中文字符，不含空格，长度2-4').css('color','#f00');
    } else {
        userNameCheck.text('会员名格式正确').css('color', 'rgb(0, 160, 0)');
    }
});

getVerification.on('click', function () {
    phoneNum = userCount.val();
    if (judgePhoneNum(phoneNum)) {
        console.log('即将发送ajax请求');
        verification.val('');
        sendSignUpAjax(phoneNum);
    } else {
        if (userCount.val() != '') {
            rewritePhoneNum(userCount, userCountCheck, '手机号格式有误');
        } else {
            rewritePhoneNum(userCount, userCountCheck, '手机号不能为空');
        }
    }

});
function sendSignUpAjax(phoneNum) {
    $.ajax({
        url: baseHttp + 'captchas',
        type: 'POST',
        dataType: 'json',
        data: {
            'phone': phoneNum,
        },
        header: {
            'Accept': 'application/json',
        },
        success: function (SignUpSucData) {
            fillImgVer(SignUpSucData);
        },
        error: function (SignUpErrData) {
            let errdata = JSON.parse(SignUpErrData.responseText);
            rewritePhoneNum(userCount, userCountCheck, errdata["errors"]["phone"][0]);
        }
    });
}

postImgVerBtn.on('click', function () {
    var deadline = convertTimeFormat(imgVer_data['expired_at']);
    var nowTime = getCurrentTime();
    if (nowTime > deadline) {
        imgVerCheck.text('验证码已失效');
        sendSignUpAjax(phoneNum);
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
                sendSignUpAjax(phoneNum);
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

pwdCheckAgain.on('blur', function () {
    if (pwdCheckAgain.val() != $('#userPass').val()) {
        $('.userPassAgain-check').text('两次密码不一致');
    } else {
        $('.userPassAgain-check').empty();
    }
});
pwdCheckAgain.on('input', function () {
    pwdCheckAgainCheck.empty();
    
});

registerBtn.on('click', function () {
    if (pwdCheckAgain.val() == '') {
        if (userPass.val() == '') {
            console.log('userPass' + userPass.val());
            if (verification.val() == '') {
                if (userCount.val() == '') {
                    userCountCheck.text('电话号码不能为空');
                    return false;
                }
                verificationCheck.text('验证码不能为空');
                return false;
            }
            userPassCheck.text('密码不能为空').css('color', '#f00');
            return false;
        }
        pwdCheckAgainCheck.text('两次密码不一致');
        return false;
    } else {
        var deadline = convertTimeFormat(ver_data['expired_at']);
        var nowTime = getCurrentTime();
        if (nowTime > deadline) {
            verificationCheck.text('验证码已失效');
            sendSignUpAjax(phoneNum);
            return false;
        } else {
            if (judgeVerCode(verification.val())) {

                console.log('验证码正确');
                return true;
            } else {
                console.log('验证码格式错误');
                getVerification.attr('type', 'button').css('background', '#1d87f7').text('获取验证码');
                return false;
            }
        }
    }
});

