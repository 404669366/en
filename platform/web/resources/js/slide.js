$(function () {
    //默认
    if ($(window).scrollTop() > 270 && $(window).scrollTop() <= 1380) {
        $('.mainRight').css({'position': 'fixed', 'right': 351.5, 'top': 0});
    } else if ($(window).scrollTop() > 1380) {
        $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': 1124});
    } else {
        $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
    }
    //滚动
    $(window).scroll(function () {
        console.log($(window).scrollTop());
        if ($(window).scrollTop() > 270 && $(window).scrollTop() <= 1380) {
            $('.mainRight').css({'position': 'fixed', 'right': 351.5, 'top': 0});
        } else if ($(window).scrollTop() > 1380) {
            $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': 1124});
        } else {
            $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
        }
    });
});