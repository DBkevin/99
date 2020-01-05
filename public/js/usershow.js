var adItem = $('.ad-item'),
    dots = $('.dot'),
    timer,
    i = 0;
$(function () {
    adItem.eq(0).show().siblings().hide();
    dots.eq(0).addClass('dots-active').siblings().removeClass('dots-active');
});

makeTimer();

adItem.hover(function () {
    clearInterval(timer);
}, makeTimer);

function makeTimer() {
    timer = setInterval(function () {
        console.log(i);
        if (i == adItem.length - 1) {
            i = 0;
        } else {
            i++;
        }
        adItem.eq(i).fadeIn().siblings().fadeOut();
        dots.eq(i).addClass('dots-active').siblings().removeClass('dots-active');
    }, 3000);
}