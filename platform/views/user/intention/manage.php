<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>意向管理</title>
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
            <li><a href="/user/user/basis-field.html">基础场地</a></li>
            <li><a href="/user/intention/list.html">我的意向</a></li>
            <li><a href="/user/release/release.html">发布真实场地</a></li>
            <li><a href="/user/field/track-field.html">场地跟踪</a></li>
            <li class="actives"><a href="/user/intention/manage.html">意向管理</a></li>
            <li><a href="/user/user/update.html">修改密码</a></li>
            <li><a href="/user/ident/ident.html">认证合伙人</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容1-->
        <div class="inner_Cont">
            <div class="userTit">
                共有<span><?= count($data) ?></span>个场地意向
            </div>
            <ul class="tab_cont">
                <li style="height: 20px;width: 718px">
                    <div style="width: 134.6px;float: left;text-align: center">场地编号</div>
                    <div style="width: 134.6px;float: left;text-align: center">意向编号</div>
                    <div style="width: 109.6px;float: left;text-align: center">意向金额</div>
                    <div style="width: 109.6px;float: left;text-align: center">意向状态</div>
                    <div style="width: 109.6px;float: left;text-align: center">创建时间</div>
                    <div style="width: 109.6px;float: left;text-align: center">操作</div>
                </li>
                <?php foreach ($data as $v): ?>
                    <li style="height: 20px;width: 718px">
                        <div style="width: 134.6px;float: left;text-align: center"><a
                                    href="/index/index/details.html?no=<?= $v['field_no'] ?>"><?= $v['field_no'] ?></a>
                        </div>
                        <div style="width: 134.6px;float: left;text-align: center"><?= $v['no'] ?></div>
                        <div style="width: 109.6px;float: left;text-align: center"><?= $v['money'] ?></div>
                        <div style="width: 109.6px;float: left;text-align: center"><?= \vendor\helpers\Constant::getIntentionStatus()[$v['status']] ?></div>
                        <div style="width: 109.6px;float: left;text-align: center"><?= date('Y-m-d H:i:s', $v['created']) ?></div>
                        <div style="width: 109.6px;float: left;text-align: center"><a
                                    href="/user/intention/detail.html?no=<?= $v['no'] ?>"
                                    style="background-color: #0B57F0;width: 60px;height: 20px;display: block;color: white;border-radius: 3px;margin: 0 auto;text-decoration: none;">详情</a>
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
        <p>Copyright © 2018 en.ink，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
</body>
</html>
