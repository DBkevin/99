var chargeContentItem = $('.content>div');
$(function () {
    chargeContentItem.hide();
    chargeContentItem.eq(0).show();
});

var contentTabItem = $('.tab-item');
contentTabItem.on('click', function () {
    var $this = $(this),
        index = $this.index();
    contentTabItem.eq(index).addClass('tab-item-active').siblings().removeClass('tab-item-active');
    chargeContentItem.hide();
    chargeContentItem.eq(index).show();
});

// 流量币充值
var chargeTypeItem = $('.charge-type-item'),//充值套餐选项
    chargeValu = $('#chargeValue'),//充值金额输入框
    onebuck = $('.coins'),//1元=xx流量币
    totalCoins = $('.total-coins'),//总计xxx流量币
    totalSearchTraffic = $('.search-traffic'),//xxx个搜索流量
    singleSearchTraffic = $('.single-search-traffic'),//（xxx流量币/个）
    collect = $('.collect'),//收藏
    singleCollect = $('.single-collect');//（70流量币/个）

chargeTypeItem.on('click', function () {
    var $this = $(this),
        index = $this.index(),
        needToPay = parseInt($this.data('pay')),
        give = $this.data('give') != undefined ? parseInt($this.data('give')) : 0;

    $this.addClass('charge-type-item-active').siblings().removeClass(' charge-type-item-active');
    chargeValu.val(needToPay);
    totalCoins.text((parseInt(chargeValu.val()) + give) * 100);
    onebuck.text(((parseInt(chargeValu.val()) + give) * 100) / parseInt(chargeValu.val()));

    if (index >= 3) {
        singleSearchTraffic.text('40');
        totalSearchTraffic.text(round(((parseInt(chargeValu.val()) + give) * 100) / 40));
        singleCollect.text('50');
        collect.text(round(((parseInt(chargeValu.val()) + give) * 100) / 50));
    } else {
        singleSearchTraffic.text('60');
        totalSearchTraffic.text(round(((parseInt(chargeValu.val()) + give) * 100) / 60));
        singleCollect.text('70');
        collect.text(round(((parseInt(chargeValu.val()) + give) * 100) / 70));
    }
});

function round(num) {
    return Math.round(num);
}

chargeValu.on('blur', function () {
    var $this = $(this),
        value = parseInt($this.val()),
        give,
        singleTraffic,
        sinCollect;

    if (value < 200) {
        give = 0;
        singleTraffic = 60;
        sinCollect = 70;
    } else if (value >= 200 && value < 500) {
        give = 20;
        singleTraffic = 60;
        sinCollect = 70;
    } else if (value >= 500 && value < 1000) {
        give = 100;
        singleTraffic = 60;
        sinCollect = 70;
    } else if (value >= 1000 && value < 2000) {
        give = 200;
        singleTraffic = 40;
        sinCollect = 50;
    } else if (value >= 2000 && value < 5000) {
        give = 600;
        singleTraffic = 40;
        sinCollect = 50;
    } else if (value >= 5000 && value < 10000) {
        give = 1000;
        singleTraffic = 40;
        sinCollect = 50;
    } else if (value >= 10000) {
        give = 2500;
        singleTraffic = 40;
        sinCollect = 50;
    }

    chargeTypeItem.each(function () {
        $(this).removeClass('charge-type-item-active');
    });
    $('.anytimeDelete').empty();

    var total = (value + give) * 100;
    totalCoins.text(total);

    singleSearchTraffic = singleTraffic;
    totalSearchTraffic.text(round(total / singleSearchTraffic));
    singleCollect = sinCollect;
    collect.text(round(total / sinCollect));
});