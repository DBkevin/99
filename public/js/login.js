userCount.on('input', function () {
    userCountCheck.empty();
    console.log(userCount.siblings('li'));
    userCount.siblings('li').empty();
});
userPass.on('input', function () {
    userPassCheck.siblings('li').empty();
    // userPassCheck.empty();
});
$('#login').on('click', function () {
    if (!judgePhoneNum(userCount.val())) {
        userNameCheck.text('账号格式有误').css('color', '#f00');
        return;
    } 
    if (!judgePwd(userPass.val())) {
        userPassCheck.text('密码长度8-20个字符，不含空格，非9位以下纯数字').css('color', '#f00');
    }

});