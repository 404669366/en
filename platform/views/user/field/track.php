<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>user</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <!--引入user样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/user.css"/>
    <!--引入字体-->
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php \vendor\helpers\Msg::run('PopupMsg') ?>
<!--header-->
<div class="header">
    <div class="nav box1200">
        <img src="/resources/images/LG.png"/>
        <ul class="nva_list">
            <?php foreach (\vendor\en\Menu::getMenu() as $v): ?>
                <a href="<?= $v['url'] ?>">
                    <li><?= $v['name'] ?></li>
                </a>
            <?php endforeach; ?>
        </ul>
        <div class="esc">
            <?= $basisData['user']['tel'] ?> |
            <a href="/login/login/logout.html">退出</a>
        </div>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<!--header end-->

<!--content-->
<div class="user_cont">
    <!--左边内容-->
    <div class="user_contLt float_left">
        <img src="/resources/images/user.png"/>
        <p class="welcome">欢迎你，<?= $basisData['user']['tel'] ?></p>
        <ul>
            <li><a href="/user/user/user.html">关注场地</a></li>
            <li><a href="/user/user/basis-field.html">基础场地</a></li>
            <li><a href="/user/intention/list.html">我的意向</a></li>
            <li class="actives"><a href="/user/field/track-field.html">场地跟踪</a></li>
            <li><a href="/user/user/update.html">修改密码</a></li>
            <li><a href="/user/ident/ident.html">认证合伙人</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容1-->
        <div class="inner_Cont">
            <div class="userTit">
                共<span><?= count($field) ?></span>个 真实场地
                <?php if ($basisData['isCobber'] == 2): ?>
                    <a href="/user/field/rob.html">
                        <strong style="float: right;cursor: pointer;color: #3072F6">
                            抢单(<?= \vendor\helpers\redis::app()->lLen('BackendField') ?>)</strong>
                    </a>
                <?php endif; ?>
            </div>
            <ul class="tab_cont">
                <?php foreach ($field as $v): ?>
                    <li>
                        <img src="<?= explode(',', $v['image'])[0] ?>"/>
                        <div class="ps1" style="width: 410px">
                            <p><span>场地编号:</span><?= $v['no'] ?></p>
                            <p><span>场地地域:</span><?= $v['full_name'] ?></p>
                            <p><span>详细地址：</span><?= $v['address'] ?></p>
                            <p>
                                <span>发布时间:</span><?= date('Y-m-d H:i:s', $v['created']) ?>&emsp;场地状态: <?= \vendor\helpers\Constant::getFieldStatus()[$v['status']] ?>
                            </p>
                        </div>
                        <div class="ps2" style="width:135px;">
                            <?= $v['budget'] ?><span class="w">￥</span>
                            <span class="fl"><?= $v['areas'] ?>㎡</span>
                            <a href="/user/field/detail.html?no=<?= $v['no'] ?>" class="bbtn">详情</a>
                        </div>
                    </li>
                <?php endforeach; ?>
                <!--清除浮动-->
                <div class="clear"></div>
            </ul>
        </div>
    </div>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--content end-->

<!--脚部start-->
<div class="footer marginTop80">
    <div class="box1200">
        <!--合作商-->
        <ul class="footer_nav">
            <?php foreach ($basisData['friends'] as $v): ?>
                <li><a rel="nofollow" target="_blank" href="<?= $v['url'] ?>"><img
                                src="<?= $v['image'] ?>"/></a></li>
            <?php endforeach; ?>
        </ul>
        <!--关于我们-->
        <ul class="footer_list">
            <?php foreach (\vendor\en\Menu::getMenu() as $k => $v): ?>
                <li>
                    <a href="<?= $v['url'] ?>"><?= $v['name'] ?></a><?= count(\vendor\en\Menu::getMenu()) == $k + 1 ? '' : '&nbsp; |&nbsp;' ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--公众号-->
        <ul class="public">
            <li><img src="/resources/images/en2.png"/></li>
            <li><img src="/resources/images/en2.png"/></li>
        </ul>
        <!--底部版权-->
        <p>Copyright © 2018 en.link，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
</body>
</html>
