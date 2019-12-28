$(function () {
    var qq = $('#QQ');
    var Reg = /^[1-9][0-9]{4,10}$/;
    qq.on('blur', function () {
        if (!Reg.test(qq.val())) {
            console.log(qq.val());
            $('.QQNum-check').text('格式不符');
        } else {
            $('.QQNum-check').empty();
        }
    });
});