$(function () {
    
    var user = $('#userCount');
    var Reg=/^1(3|4|5|6|7|8|9)\d{9}$/;
    user.on('blur', function () {
        if (!Reg.test(user.val())) {
            user.attr('data-qualified', 'false');
            $('.userCount-check').text('手机号格式有误');
        } else {
            user.attr('data-qualified', 'true');
            $('.userCount-check').empty();
        }
    });
    
});
