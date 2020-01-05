var add = $('.add'),//加号
    reduce = $('.reduce');//减号
var keyword_1st = $('.add-keyword-wrap:first');//关键词1 的DOM元素
//加号功能
add.on('click', function () {
    var newKeyword = keyword_1st.clone(true);
    $('.add-keyword-wrap:last').after(newKeyword);
    newKeyword.find('.title:first').text('关键词' + $('.add-keyword-wrap').length);
});
//减号功能
reduce.on('click', function () {
    if ($('.add-keyword-wrap').length == 1) {
        return alert('关键词至少要有一个');
    }
    $('.add-keyword-wrap:last').remove();
});

var staydays = $('.days'),//发布天数
    fixedDay = $('.fixed-days'),//固定天数按钮
    startTime = $('#StartTime');//开始时间
//选择固定天数
fixedDay.each(function () {
    var $this = $(this),
        day = $this.data('day');

    $this.on('click', function () {
        staydays.val(day);
    });
});

var currentTime = new Date().getHours();//获取当前时间
var times = $('.dis-num');//24小时细分的输入框
var dayTraffic = $('.dayTraffic-num'),//日发布量DOM元素
    dayTrafficVal = dayTraffic.val();//日发布量
var hourLeft = 24 - currentTime,//当日剩余小时数
    timeLeft = dayTrafficVal % hourLeft;//发布量 % 剩余小时 = 剩余没有分布的

var noDistributionBefore7 = $('.morningBtn'),//0-7不发布
    dayDistribution = $('.afternoonBtn');//24小时发布

$(function () {
    distributionTime(currentTime, dayTrafficVal, timeLeft, hourLeft);
});

//当‘每天发布量’输入框值改变的时候
dayTraffic.on('change', function () {
    dayTrafficVal = dayTraffic.val();//拿到新的发布量
    timeLeft = dayTrafficVal % hourLeft;//新的剩余没有分布的

    distributionTime(currentTime, dayTrafficVal, timeLeft, hourLeft);
});
//当点击0-7点不分配时
noDistributionBefore7.on('click', function () {
    var nowDay = getToday(),
        startday = getStartDay(startTime.val());

    if (staydays.val() > 1 || startday > nowDay || currentTime <= 7) {
        currentTime = 8;
    }

    dayTrafficVal = dayTraffic.val();
    hourLeft = 24 - currentTime;
    timeLeft = dayTrafficVal % hourLeft;

    distributionTime(currentTime, dayTrafficVal, timeLeft, hourLeft);
    for (var i = 0; i <= 7; i++) {
        times.eq(i).val(0);
    }
    return false;
});
//当点击24小时分配
dayDistribution.on('click', function () {
    var nowDay = getToday(),
        startday = getStartDay(startTime.val());

    //当发布天数 > 1  ||  当前时间位于开始时间之前
    if (staydays.val() > 1 || startday > nowDay) {
        dayTrafficVal = dayTraffic.val();
        currentTime = 0;
        hourLeft = 24 - currentTime;
        timeLeft = dayTrafficVal % hourLeft;
        distributionTime(currentTime, dayTrafficVal, timeLeft, hourLeft);
    } else {
        alert('发布天数大于1或开始时间大于今天才能生效');
    }

    return false;
});
function distributionTime(curTime, dayTraVal, tLeft, hLeft) {
    for (var i = curTime; i < 24; i++) {
        times.eq(i).val((dayTraVal - tLeft) / hLeft);
    }
    if (tLeft != 0) {
        console.log(timeLeft);
        for (var i = 0; i < tLeft; i++) {
            var tmpRandomNum = randomNum(curTime, 23);
            var rawVal = parseInt(times.eq(tmpRandomNum).val());

            times.eq(tmpRandomNum).val(rawVal + 1);
        }
    }
}
function randomNum(max, min) {
    return Math.round(min + Math.random() * (max - min));
}
function getStartDay(day) {
    var reg = /-/g;
    return day.replace(reg, '');
}
function getToday() {
    var today = new Date(),
        year = today.getFullYear(),
        month = today.getMonth() < 10 ? '0' + (today.getMonth() + 1) : today.getMonth(),
        day = today.getDate() < 10 ? '0' + (today.getDate()) : today.getDate();

    return '' + year + month + day;
}

var plant = $('input[name="plant"]'),
    task = $('input[name="task"]'),
    type = $('input[name="type"]');
var submitBtn = $('.release');
submitBtn.on('click', function () {
    console.log($.trim($('.slider-item-active>span').text()));
    console.log($.trim($('.tab-item-active').text()));
    console.log($.trim($('.choosen-taskType').text()));
    // plant.val()

    return false;
});

// 平台 slider-item-active  plant
// 任务类型 tab-item-active  task
// app流量 choosen-taskType  type