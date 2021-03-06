<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>基础场地</title>
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
<?php \vendor\helpers\Msg::run() ?>
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
            <li class="actives"><a href="/user/user/basis-field.html">基础场地</a></li>
            <li><a href="/user/intention/list.html">我的意向</a></li>
            <?php if ($basisData['isCobber']): ?>
                <li><a href="/user/release/release.html">发布真实场地</a></li>
                <li><a href="/user/field/track-field.html">场地跟踪</a></li>
                <li><a href="/user/intention/manage.html">意向管理</a></li>
            <?php endif; ?>
            <li><a href="/user/user/update.html">修改密码</a></li>
            <li><a href="/user/ident/ident.html">认证合伙人</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容1-->
        <div class="inner_Cont">
            <div class="userTit">
                共发布<span><?= count($basis) ?></span>个基础场地<a href="/user/release/release-basis.html"><strong style="float: right;cursor: pointer;color: #3072F6">发布场地</strong></a>
            </div>
            <ul class="tab_cont">
                <li style="height: 20px;width: 718px">
                    <div style="width: 226px;float: left;text-align: center">地理位置</div>
                    <div style="width: 226px;float: left;text-align: center">详细地址</div>
                    <div style="width: 226px;float: left;text-align: center">创建时间</div>
                </li>
                <?php foreach ($basis as $v): ?>
                    <li style="height: 20px;width: 718px">
                        <div style="width: 226px;float: left;text-align: center"> <?= $v['full_name'] ?></div>
                        <div style="width: 226px;float: left;text-align: center"> <?= $v['address'] ?></div>
                        <div style="width: 226px;float: left;text-align: center"> <?= date('Y-m-d H:i:s', $v['created']) ?></div>
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
        <p>Copyright © 2018 en.ink，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
</body>
</html>
