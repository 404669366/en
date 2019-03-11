window.onload = function () {
    var val = $('#cycle').text();
    $('#cycle').text('').radialIndicator({
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
    var rightMargin = $(document).width() - $('.mainRight').width() - $('.mainRight').offset().left;
    //默认
    if ($(window).scrollTop() > 270 && $(window).scrollTop() <= map) {
        $('.mainRight').css({'position': 'fixed', 'right': rightMargin, 'top': 0});

    } else if ($(window).scrollTop() > map) {
        $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': map - 250});
    } else {
        $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
    }
    //滚动
    $(window).scroll(function () {
        if ($(window).scrollTop() > 270 && $(window).scrollTop() <= map) {
            $('.mainRight').css({'position': 'fixed', 'right': rightMargin, 'top': 0});
        } else if ($(window).scrollTop() > map) {
            $('.mainRight').css({'position': 'absolute', 'right': 0, 'top': map - 250});
        } else {
            $('.mainRight').css({'position': 'static', 'right': 0, 'top': 0});
        }
    });
};