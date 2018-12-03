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
<? \vendor\helpers\Msg::run('PopupMsg') ?>
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
            <li class="actives"><a href="#">关注场地</a></li>
            <li><a href="#">编辑资料</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容1-->
        <div class="inner_Cont" style="display: block;">
            <div class="userTit">
                共<span>0</span>套 关注房源
            </div>
            <!--tab标题-->
            <ul class="tab">
                <li class="active">场地</li>
                <li>新房</li>
                <li>租房</li>
            </ul>
            <!--tab_cont内容-->
            <ul class="tab_cont">
                <li>
                    <img src="/resources/images/cd.jpg"/>
                    <div class="ps1">
                        <p><span>小区名称：</span>光华逸家地图</p>
                        <p><span>所在区域:</span>外光华三环至绕城高速近4号线中坝站</p>
                        <p><span>看地时间:</span>提前预约时间随时可看</p>
                        <p><span>场地编号:</span>0000-0000-0000</p>
                    </div>
                    <div class="ps2">
                        222
                        <span class="w">万</span>&nbsp;<span class="fl">43.56平米</span>
                        <button class="bbtn">按钮</button>
                    </div>
                </li>
                <li>
                    <img src="/resources/images/cd.jpg"/>
                    <div class="ps1">
                        <p><span>小区名称：</span>光华逸家地图</p>
                        <p><span>所在区域:</span>外光华三环至绕城高速近4号线中坝站</p>
                        <p><span>看地时间:</span>提前预约时间随时可看</p>
                        <p><span>场地编号:</span>0000-0000-0000</p>
                    </div>
                    <div class="ps2">
                        222
                        <span class="w">万</span>&nbsp;<span class="fl">43.56平米</span>
                        <button class="bbtn">按钮</button>
                    </div>
                </li>
                <li>
                    <img src="/resources/images/cd.jpg"/>
                    <div class="ps1">
                        <p><span>小区名称：</span>光华逸家地图</p>
                        <p><span>所在区域:</span>外光华三环至绕城高速近4号线中坝站</p>
                        <p><span>看地时间:</span>提前预约时间随时可看</p>
                        <p><span>场地编号:</span>0000-0000-0000</p>
                    </div>
                    <div class="ps2">
                        222
                        <span class="w">万</span>&nbsp;<span class="fl">43.56平米</span>
                        <button class="bbtn">按钮</button>
                    </div>
                </li>
                <li>
                    <img src="/resources/images/cd.jpg"/>
                    <div class="ps1">
                        <p><span>小区名称：</span>光华逸家地图</p>
                        <p><span>所在区域:</span>外光华三环至绕城高速近4号线中坝站</p>
                        <p><span>看地时间:</span>提前预约时间随时可看</p>
                        <p><span>场地编号:</span>0000-0000-0000</p>
                    </div>
                    <div class="ps2">
                        222
                        <span class="w">万</span>&nbsp;<span class="fl">43.56平米</span>
                        <button class="bbtn">按钮</button>
                    </div>
                </li>
                <li>
                    <img src="/resources/images/cd.jpg"/>
                    <div class="ps1">
                        <p><span>小区名称：</span>光华逸家地图</p>
                        <p><span>所在区域:</span>外光华三环至绕城高速近4号线中坝站</p>
                        <p><span>看地时间:</span>提前预约时间随时可看</p>
                        <p><span>场地编号:</span>0000-0000-0000</p>
                    </div>
                    <div class="ps2">
                        222
                        <span class="w">万</span>&nbsp;<span class="fl">43.56平米</span>
                        <button class="bbtn">按钮</button>
                    </div>
                </li>
                <!--清除浮动-->
                <div class="clear"></div>
            </ul>
        </div>
        <!--盒子里面的内容2-->
        <div class="inner_Cont" style="display: none;">
            <div class="userTit">
                我的账户信息
            </div>
            <!--tab标题-->
            <ul class="tab">
                <li class="active">修改昵称</li>
                <li>修改密码</li>
            </ul>

            <!--tab内容1-->
            <form action="/site/password/" method="post" id="updatePwd" style="display: none;">
                <ul class="change_pwd">
                    <li>
                        <span>输入旧密码：</span>
                        <input type="password" name="password" id="password" placeholder="请输入密码"
                               validate="notNull,minLength" validatedata="minLength=6" validatename="密码" maxlength="20">
                    </li>
                    <li>
                        <span></span>
                        <button>保存修改</button>
                    </li>
                </ul>
            </form>

            <!--tab内容2-->
            <form action="/site/password/" method="post" id="updatePwd" style="display: none;">
                <ul class="change_pwd">
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
