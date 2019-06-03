<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="/resources/css/personal.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
    <?php \vendor\helpers\Msg::run('0.6rem') ?>
</head>
<body>
<div id="header">
    <!--headaCard-->
    <div class="headCard">
        <!--名片昵称-->
        <div class="carList">
            <p class="head_port"><img src="/resources/images/csy.jpg" alt=""></p>
            <p class="nick_name">
                <?= Yii::$app->user->identity->tel ?>
                <br>
                <!--                <span>积分 78</span>-->
            </p>
            <?php $moneys = explode('.', (string)(sprintf("%.2f", Yii::$app->user->identity->money))) ?>
            <p class="balance"><?= $moneys[0] ?>.<span><?= $moneys[1] ?></span></p>
        </div>
        <!--账户充值-->
        <div class="account">
            <p style="border-right: 0.015rem solid #fff">
                <span><i class="fa fa-jpy" aria-hidden="true"></i></span>
                <a href="/user/recharge/recharge.html">前往充值</a>
            </p>
            <p>
                <span><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                <a href="#">扫码付款</a>
            </p>
        </div>
    </div>

    <!--收藏列表-->
    <ul class="collect_list">
        <a href="#">
            <li>
                <p class="txt_red"><i class="fa fa-heart" aria-hidden="true"></i></p>
                我的收藏
            </li>
        </a>
        <a href="#">
            <li class="comment">
                <p class="txt_org"><i class="fa fa-commenting" aria-hidden="true"></i></p>
                我的点评
            </li>
        </a>
        <a href="#">
            <li>
                <p class="txt_blue"><i class="fa fa-newspaper-o" aria-hidden="true"></i></p>
                浏览记录
            </li>
        </a>
    </ul>

    <!--消费列表-->
    <ul class="list">
        <a href="/order/order/order.html">
            <li>
                <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                我的订单
                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            </li>
        </a>
        <a href="/user/record/record.html">
            <li>
                <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                充值记录
                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            </li>
        </a>
        <a href="/user/problem/problem.html">
            <li>
                <span><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
                <span class="other">
                    <span>
                        常见问题
                    <p>有疑问就找我们，客户在里面</p>
                    </span>
                </span>
                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            </li>
        </a>
        <a href="#">
            <li>
                <span><i class="fa fa-cog" aria-hidden="true"></i></span>
                <span>设置</span>
                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
            </li>
        </a>
    </ul>
</div>
<ul class="footer">
    <li class="fl jump" url="/user/map/map.html">
        <span>
            <p><i class="fa fa-safari" aria-hidden="true"></i></p>
            发现
        </span>
    </li>
    <li class="jump" url="/user/charge/charge.html">
        <p><img src="/resources/images/sys.jpg" alt=""></p>
    </li>
    <script>

    </script>
    <a href="/user/record/add.html">
    <li class="fr activ">
        <span>
            <p><i class="fa fa-user-o" aria-hidden="true"></i></p>
            我的
        </span>
        </span>
    </li>
    <script>

    </script>
    </a>
</ul>
</body>
</html>