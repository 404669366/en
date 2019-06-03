<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>充值</title>
    <link rel="stylesheet" href="/resources/css/recharge.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
</head>
<body>
<div class="rechargeBox">
    <div class="rechargeTit">
        当前余额&nbsp;<span
                class="balance"><?= explode('.', (string)(sprintf('%.2f', Yii::$app->user->identity->money)))[0] ?>
            .<?= explode('.', (string)(sprintf('%.2f', Yii::$app->user->identity->money)))[1] ?></span>元
    </div>
    <ul>
        <li>
            <p class="activ click default" money="20">20元</p>
            <p class="click" money="30">30元</p>
            <p class="mrg0 click" money="50">50元</p>
            <p class="click" money="100">100元</p>
            <p class="click" money="200">200元</p>
            <p class="mrg0 click" money="300">300元</p>
        </li>
    </ul>
    <script>
        var money = $('.default').attr('money');
        $('.click').click(function () {
            $(this).addClass('activ').siblings().removeClass('activ');
            money = $(this).attr('money');
        });
    </script>
</div>
<div class="pay_mode">
    <div class="rechargeTit">选择支付方式</div>
    <ul>
        <li style="display: none">
            <p class="fl">
                <img src="/resources/images/zfb.jpg" alt="">
            </p>
            <p class="fl">
                支付宝支付
            </p>
            <p class="fr">
                <span><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            </p>
        </li>
        <li>
            <p class="fl">
                <img src="/resources/images/wx.jpg" alt="">
            </p>
            <p class="fl way" way="1">
                微信支付
            </p>
            <p class="fr">
                <span class="default"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            </p>
        </li>
        <li style="display: none">
            <p class="fl">
                <img src="/resources/images/bank.jpg" alt="">
            </p>
            <p class="fl">
                银行卡支付
            </p>
            <p class="fr">
                <span><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            </p>
        </li>
    </ul>
    <script>
        $(".pay_mode ul li").click(function () {
            $(this).find('.fr>span').toggleClass('active');
        });
    </script>
</div>
<div class="payBtn">
    立即充值
</div>
<script>
    $('.payBtn').click(function () {
        if ($('.default').hasClass('active')){
            var way = $('.way').attr('way');
            var balance = $('.balance').text();
            balance = balance.replace(/\s/g, '');
            $.getJSON('/order/order/wx.html', {'money': money, 'balance': balance, 'way': way}, function (re) {
                if (re.type) {
                    wx.config({
                        debug: false,
                        appId: re.data.js.appId,
                        timestamp: re.data.js.time,
                        nonceStr: re.data.js.nonceStr,
                        signature: re.data.js.signature,
                        jsApiList: ['chooseWXPay']
                    });
                    wx.ready(function () {
                        re.data.wx.success = function (re) {
                            back('充值成功');
                        };
                        re.data.wx.cencel = function (re) {
                            window.location.href = '/user/user/user.html';
                            back('充值取消');
                        };
                        re.data.wx.fail = function (re) {
                            window.location.href = '/user/user/user.html';
                            back('充值失败');
                        };
                        wx.chooseWXPay(re.data.wx);
                    });
                } else {
                    layer.msg('获取支付失败');
                }
            });
        }else {
            layer.msg('<span style="font-size: 0.42rem">请选择支付方式</span>');
        }

    });

    function back(msg='') {
        layer.msg(msg);
        setTimeout(function () {
            window.location.href = '/user/user/user.html';
        }, 2000);
    }
</script>
</body>
</html>