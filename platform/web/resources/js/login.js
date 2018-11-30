$(function () {
    $('.loginCont>i').click(function () {
        $('.login_bg').fadeOut();
        $(this).parents('.login_form').fadeOut();
    });
    $('.goLogin').click(function () {
        $('.login_bg').fadeIn();
        $('.doLoginTel').fadeIn();
    });
    $('.toPwdLogin').click(function () {
        $('.login_form').fadeOut();
        $('.doLoginPwd').fadeIn();
    });
    $('.toTelLogin').click(function () {
        $('.doLoginPwd').fadeOut();
        $('.doLoginTel').fadeIn();
    });
    $('.toRetrieve').click(function () {
        $('.doLoginPwd').fadeOut();
        $('.doRetrieve').fadeIn();
    });
    $('.goRegister').click(function () {
        $('.login_bg').fadeIn();
        $('.doRegister').fadeIn();
    });
});