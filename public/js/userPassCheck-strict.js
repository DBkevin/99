$(function () {
    var pwd = $('#userPass');
    var Reg = /^[a-zA-Z0-9~!@&%#*._]{9,20}$/;
    pwd.on('blur', function () {
        if (!Reg.test(pwd.val())) {
            console.log(pwd.val());
            $('.userPass-check').text('密码长度8-20个字符，不含空格，非9位以下纯数字');
        } else {
            $('.userPass-check').text('密码格式正确').css('color','rgb(0, 160, 0)');
        }
    });
});