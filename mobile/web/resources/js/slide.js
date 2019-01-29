$(function () {
    var val = $('#cycle').text();
    $('#cycle').css({position: 'absolute', 'z-index': 10, right: 0, top: '142px'}).text('').radialIndicator({
        barColor: {
            0: '#94B1EC',
            33: '#5E8AE2',
            66: '#3072f6',
            100: '#0038A8'
        },

        initValue: val,
        percentage: true
    });
    var map = $('.map').offset().top - 500;
    //默认
    if ($(window).scrollTop() > 270 && $(window).scrollTop() <= map) {
        $('.mainRight').css({'position': 'fixed', 'right': 351.5, 'top': 0});
        $('#cycle').css({'top': 110});

    } else if ($(window).scrollTop() > map) {
        $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': map - 250});
        $('#cycle').css({'top': 110});
    } else {
        $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
        $('#cycle').css({'top': 142});
    }
    //滚动
    $(window).scroll(function () {
        if ($(window).scrollTop() > 270 && $(window).scrollTop() <= map) {
            $('.mainRight').css({'position': 'fixed', 'right': 351.5, 'top': 0});
            $('#cycle').css({'top': 110});
        } else if ($(window).scrollTop() > map) {
            $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': map - 250});
            $('#cycle').css({'top': 110});
        } else {
            $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
            $('#cycle').css({'top': 142});
        }
    });
});