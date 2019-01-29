$(function () {
    $('.eye>i').click(function () {
        if ($('.eye>input').prop('type') === 'text') {
            $('.eye>input').prop('type', 'password');
        } else {
            $('.eye>input').prop('type', 'text');
        }
    });
});