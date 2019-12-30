/**
 * 基础url
 * 用户账号输入区
 * 手机号输入框纠错区
 * 手机号
 * 图形验证码图片
 * 图形验证码输入框
 * 用户请求ID
 * 提交图形验证码按钮
 * 图形验证码纠错区
 * 短信验证码纠错区
 * 短信验证码ID
 * 图形验证码数据
 * 验证码数据
 * 密码输入框
 * 密码输入框纠错区
 * 提交按钮
 * 检查密码的定时器
 */
var baseHttp = 'http://99.test/api/v1/';
var userCount = $('#userCount'),
    userCountCheck = $('.userCount-check'),
    phoneNum;
var imgVer = $('.imgVer'),
    imgVer_img = $('.imgVer-img'),
    imgVer_ver = $('.imgVer-ver'),
    userID = $('.userID'),
    postImgVerBtn = $('#post-imgVer-btn'),
    imgVerCheck = $('.imgVer-ver-check'),
    verificationCheck = $('.verification-check'),
    verificationID = $('#verificationID');
var imgVer_data,
    ver_data;
var userPass = $('#userPass'),
    userPassCheck = $('.userPass-check'),
    pwd;
var submitBtn = $('#submitBtn');
var checkPWD;
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
function judgePwd(pwd) {
    var Reg = /^[a-zA-Z0-9~!@&%#*._]{9,20}$/;

    if (!Reg.test(pwd)) {
        return false;
    } else {
        return true;
    }
}
function judgeVerCode(code) {
    var Reg = /[0-9]{4}/;
    if (!Reg.test(code)) {
        return false;
    } else {
        return true;
    }
}
//重写电话号码
function rewritePhoneNum($focusEle, $checkEle, sentence) {
    $focusEle.focus();
    $checkEle.text(sentence);
    $focusEle.on('input', function () {
        $checkEle.text('');
    });
}
//将图片验证码装填
function fillImgVer(imgVerData) {
    imgVer_data = imgVerData;
    imgVer.show();

    imgVer_img.attr('src', imgVerData['caotcha_image_content']);

    userID.attr('value', imgVerData['captcha_key']);
}
//隐藏图片验证码区域，进行下一步
function fillVerificationID(verData) {
    ver_data = verData;

    imgVer.hide();

    verificationID.val(verData['key']);
}

//获取当前时间
function getCurrentTime() {
    var time = new Date(),
        year = time.getFullYear(),
        month = time.getMonth() + 1,
        date = time.getDate(),
        hour = time.getHours(),
        min = time.getMinutes(),
        sec = time.getSeconds();

    return '' + year + correctNum(month) + correctNum(date) + correctNum(hour) + correctNum(min) + correctNum(sec);
}
//纠正时间格式
function convertTimeFormat(time) {
    var regConnector = /-/g,
        regcolon = /:/g;
    var time = time.replace(regConnector, '').replace(regcolon, '').replace(' ', '');

    return time;
}
//为个位数加0
function correctNum(num) {
    if (num < 10) {
        return '0' + num;
    } else {
        return num;
    }
}