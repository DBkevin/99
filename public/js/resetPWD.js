var verification = $('#verification'),
    getVerification = $('#getVerification');

var userCount = $('#userCount'),
    userCountTip = $('.userCount-check');

/**
 * @name  为获取验证码按钮添加点击事件
 */
getVerification.on('click', function () {
    phoneNum = userCount.val();
    if (judgePhoneNum(phoneNum)) {
        console.log('即将发送ajax请求');
        verification.val('');
        sendResetPwdAjax(phoneNum);
    } else {
        console.log(judgePhoneNum(phoneNum));
        rewritePhoneNum(userCount, userCountCheck, '手机号格式有误');
    }

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
    var deadline = convertTimeFormat(ver_data['expired_at']);
    var nowTime = getCurrentTime();
    if (nowTime > deadline) {
        verificationCheck.text('验证码已失效');
        sendResetPwdAjax(phoneNum);
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
});