/* 
    step01  为获取验证码按钮添加点击事件
    step02  判断手机号是否为空
    step03  若手机号为空，在手机号输入框下面显示“请先输入手机号”
    step04  若手机号不为空，判断手机号是否合格
    step05  手机号合格，发送ajax请求
    step06  

*/
$(function () {
    var verification = $('#verification'),
        getVerification = $('#getVerification');

    var userCount = $('#userCount'),
        userCountTip = $('.userCount-check');

    getVerification.on('click', function () {
        let phoneNum = $('#userCount').val();
        if (judgePhoneNum(phoneNum)) {
            console.log('即将发送ajax请求');
            sendAjax(phoneNum);
        } else {
            console.log(judgePhoneNum(phoneNum));
            rewritePhoneNum(userCount,userCountCheck, '手机号格式有误');
        }

    });

    function sendAjax(phoneNum) {
        $.ajax({
            url: baseHttp + 'restpasswdcaptchas',
            // async:false,
            type: 'POST',
            dataType: 'json',
            data: {
                'phone': phoneNum,
            },
            header: {
                'Accept':'application/json',
            },
            success: function (resetPwdSucData) {
                console.log(resetPwdSucData);
                
            },
            error: function (resetPwdErrData) {
                let errdata = JSON.parse(resetPwdErrData.responseText);
                rewritePhoneNum(userCount,userCountCheck, errdata["errors"]["phone"][0]);
            }
        });
    }

});