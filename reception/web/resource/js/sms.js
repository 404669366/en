function sms(config) {
    $('body').on('click', '.smsCode', function () {
        var tel = $(config.tel).val();
        if (!(/^1(3|4|5|7|8)\d{9}$/.test(tel))) {
            layer.msg('手机号有误');
            return false;
        }
        if ($(this).hasClass('smsCodeSend')) {
            layer.msg('验证码已发送,请稍后再试');
            return false;
        }
        $.getJSON(config.url || '/sms/sms/send', {tel: tel}, function (re) {
            if (re.type) {
                layer.msg('验证码已发送,请注意查收');
                var t = 60;
                $('.smsCode').addClass('smsCodeSend').text(t + 's');
                var id = setInterval(function () {
                    if (t--) {
                        $('.smsCode').text(t + 's');
                    } else {
                        $('.smsCode').removeClass('smsCodeSend').text('发送');
                        clearInterval(id);
                    }
                }, 1000);
            } else {
                layer.msg(re.msg);
                return false;
            }
        })
    });
}