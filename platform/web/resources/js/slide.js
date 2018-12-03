$(function () {
    var map = $('.map').offset().top - 500;
    //默认
    if ($(window).scrollTop() > 270 && $(window).scrollTop() <= map) {
        $('.mainRight').css({'position': 'fixed', 'right': 351.5, 'top': 0});
    } else if ($(window).scrollTop() > map) {
        $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': map - 250});
    } else {
        $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
    }
    //滚动
    $(window).scroll(function () {
        if ($(window).scrollTop() > 270 && $(window).scrollTop() <= map) {
            $('.mainRight').css({'position': 'fixed', 'right': 351.5, 'top': 0});
        } else if ($(window).scrollTop() > map) {
            $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': map - 250});
        } else {
            $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
        }
    });
});