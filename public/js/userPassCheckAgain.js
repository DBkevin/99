$(function () {
    var pwdCheckAgain = $('#userPassAgain');
    pwdCheckAgain.on('blur', function () {
        if (pwdCheckAgain.val() != $('#userPass').val()) {
            console.log(pwdCheckAgain.val());
            console.log($('#userPass').val());
            $('.userPassAgain-check').text('两次密码不一致');
        } else {
            $('.userPassAgain-check').empty();
        }
    });
});