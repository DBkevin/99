/**
 * 基础url
 * 用户账号输入区
 * 手机号输入框纠错区
 */
var baseHttp = 'http://99.test/api/v1/';
var userCount =$('#userCount'),
    userCountCheck = $('.userCount-check');
/**
 * @name  判断手机号码的正确性
 * @param {int} phoneNum 
 * @returns Boolean
 */
function judgePhoneNum(phoneNum) {
    var Reg = /^1(3|4|5|6|7|8|9)\d{9}$/;

    if (!Reg.test(phoneNum)) {
        return false;
    } else {
        return true;
    }
}

function rewritePhoneNum($focusEle, $ele, sentence) {
    $focusEle.focus();
    $ele.text(sentence);
    $focusEle.on('input',function () {
        $ele.text('');
    });
}