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
            <li><a href="/user/user/basis-field.html">基础发布</a></li>
            <li class="actives"><a href="/user/user/track-field.html">场地跟踪</a></li>
            <?php if (!$basisData['isCobber'] || $basisData['isCobber']->type == 1): ?>
                <li><a href="/user/user/ident.html">认证合伙人</a></li>
            <?php endif; ?>
            <li><a href="/user/user/update.html">修改密码</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容1-->
        <div class="inner_Cont">
            <div class="userTit">
                共<span><?= count($field) ?></span>个 关注场地
            </div>
            <ul class="tab_cont">
                <?php foreach ($field as $v): ?>
                    <li>
                        <a href="/index/index/details.html?no=<?= $v['no'] ?>" style="color: #333333">
                            <img src="<?= explode(',', $v['image'])[0] ?>"/>
                            <div class="ps1">
                                <p><span>场地编号:</span><?= $v['no'] ?></p>
                                <p><span>场地地域:</span><?= $v['full_name'] ?></p>
                                <p><span>详细地址：</span><?= $v['address'] ?></p>
                                <p><span>关注时间:</span><?= date('Y-m-d H:i:s', $v['created']) ?></p>
                            </div>
                        </a>
                        <div class="ps2">
                            <?= $v['budget'] ?>
                            <span class="w">万</span>&nbsp;<span class="fl"><?= $v['areas'] ?>㎡</span>
                            <a href="/user/follow/cancel.html?no=<?= $v['no'] ?>" class="bbtn">取消关注</a>
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
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
        </ul>
        <!--关于我们-->
        <ul class="footer_list">
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a></li>
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
