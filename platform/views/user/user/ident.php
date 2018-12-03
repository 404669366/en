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
    <link rel="stylesheet" type="text/css" href="/resources/css/bootstrap.min.css"/>
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
            <?php if ($basisData['isCobber']): ?>
                <li><a href="/user/user/track-field.html">场地跟踪</a></li>
            <?php endif; ?>
            <li class="actives"><a href="/user/user/ident.html">认证合伙人</a></li>
            <li><a href="/user/user/update.html">修改密码</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容2-->
        <div class="inner_Cont">
            <div class="userTit">
                认证合伙人
            </div>
            <!--tab内容2-->
            <form action="/site/password/" method="post" id="updatePwd">
                <ul class="change_pwd">
                    <?php if(!$basisData['isCobber']):?>
                    <li>
                        <span>输入旧密码：</span>
                        <input type="password" name="password" id="password" placeholder="请输入密码"
                               validate="notNull,minLength" validatedata="minLength=6" validatename="密码" maxlength="20">
                    </li>
                    <li>
                        <span>设置新密码：</span>
                        <input type="password" name="newPassword" id="password1" placeholder="请输入新密码"
                               validate="notNull,minLength,isStandard" validatedata="minLength=8" validatename="密码"
                               maxlength="20">
                    </li>
                    <li>
                        <span>确认新密码：</span>
                        <input type="password" placeholder="请确认新密码" validate="notNull,isSame"
                               validatedata="isSame=#password1" validatename="确认新密码" maxlength="20">
                    </li>
                    <?php endif;?>
                    <li>
                        <span></span>
                        <button>保存修改</button>
                    </li>
                </ul>
            </form>
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
