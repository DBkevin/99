$(function () {
    var verification = $('#verification'),
        getVerification = $('#getVerification');

    var userCount = $('#userCount'),
        userCountTip = $('.userCount-check');

    getVerification.on('click', function () {
        phoneNum = userCount.val();
        if (judgePhoneNum(phoneNum)) {
            console.log('即将发送ajax请求');
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

    userPass.on('focus', function () {
        userPassCheck.text('密码长度8-20个字符，不含空格，非9位以下纯数字');
    });

    submitBtn.on('click', function () {
        var deadline = convertTimeFormat(ver_data['expired_at']);
        var nowTime = getCurrentTime();
        console.log(deadline);
        console.log(nowTime);
        if (nowTime > deadline) {
            verificationCheck.text('验证码已失效');
            sendResetPwdAjax(phoneNum);
        } else {
            // sendSubmitAjax(verificationID.val());
        }
    });

    //go on
    function sendSubmitAjax(key) {
        $.ajax({
            url: baseHttp + 'verificationCodes',
            type: 'POST',
            dataType: 'json',
            data: {
                'key': key
            },
            header: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            success: function (verSucData) {
                fillVerificationID(verSucData);
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
});