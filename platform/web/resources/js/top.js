$(function () {
    $('.footer').after('<div id="top" style="display: none"></div>');
    //默认
    if ($(window).scrollTop() > 500) {
        $('#top').fadeIn();
    } else {
        $('#top').fadeOut();
    }
    //滚动
    $(window).scroll(function () {
        //判断当window的scrolltop距离大于5时，显示图标
        if ($(this).scrollTop() > 500) {
            $('#top').fadeIn();
        } else {
            $('#top').fadeOut();
        }
    });
    //点击事件
    $('#top').click(function () {
        $('html,body').animate({scrollTop: 0}, 500);
        return false;
    });
});