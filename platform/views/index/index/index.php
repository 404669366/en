<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <!--引入index样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css"/>
    <!--引入字体-->
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <!--引入jquery-->
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/top.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/login.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/sms.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/eye.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/submit.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php \vendor\helpers\Msg::run() ?>
<!--头部start-->
<?php if ($basisData['isGuest']): ?>
    <div class="loninContaner">
        <div class="login_bg" style="display: none"></div>
        <!--longin-form1-->
        <div class="login_form login_forms doLoginTel" style="display: none">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">手机快捷登录</p>
                <p class="login_a"></p>
                <ul class="log_input submit">
                    <li>
                        <input type="text" class="inputs top_border loginTel" maxlength="11" placeholder="请输入手机号">
                    </li>
                    <li style="position: absolute">
                        <input type="text" class="inputs btm_border loginTelCode" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a telLoginClick">获取验证码</div>
                    </li>
                    <script>
                        sms({
                            click: '.telLoginClick',
                            telModel: '.loginTel'
                        });
                    </script>
                    <li class="li_btn">
                        <button type="button" class="loginTelUp" style="margin-top: 71px">登录</button>
                    </li>
                    <li class="foot_link">
                        <span class="alink toPwdLogin">账号密码登录</span>
                        <p>登录即代表同意
                            <a href="#">《亿能隐私政策》</a>
                            及
                            <a href="#">《亿能用户服务协议》</a>
                        </p>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.loginTelUp',
                        url: '/login/login/login-t.html',
                        params: ['loginTel', 'loginTelCode'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
        <!--账号密码登录longin-form3-->
        <div class="login_form login_forms doLoginPwd" style="display: none;">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">账号密码登录</p>
                <p class="login_a"></p>
                <ul class="log_input submit">
                    <li>
                        <input type="tel" class="inputs top_border num loginPTel" maxlength="11" placeholder="请输入手机号">
                    </li>

                    <li class="eye" style="position: relative">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="password" class="inputs btm_border pwd" minlength="8" placeholder="请输入登录密码">
                    </li>
                    <li class="forget_pwd">
                        <span class="toRetrieve">忘记密码</span>
                    </li>
                    <li class="forget_btn">
                        <button type="button" class="loginPClick">登录</button>
                    </li>
                    <li class="foot_link">
                        <span class="alink toTelLogin">手机快捷登录</span>
                        <p>登录即代表同意
                            <a href="#">《亿能隐私政策》</a>
                            及
                            <a href="#">《亿能用户服务协议》</a>
                        </p>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.loginPClick',
                        url: '/login/login/login-p.html',
                        params: ['loginPTel', 'pwd'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
        <!--找回密码longin-form4-->
        <div class="login_form login_forms doRetrieve" style="display: none;">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">找回密码</p>
                <p class="login_a"></p>
                <ul class="log_input submit">
                    <li>
                        <input type="text" class="inputs top_border reLoginTel" maxlength="11" placeholder="请输入手机号">
                    </li>
                    <li style="position: relative">
                        <input type="text" class="inputs reLoginCode" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a reLoginClick">获取验证码</div>
                    </li>
                    <script>
                        sms({
                            click: '.reLoginClick',
                            telModel: '.reLoginTel'
                        });
                    </script>
                    <li class="eye" style="position: relative">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="text" class="inputs btm_border reLoginPwd" minlength="8"
                               placeholder="请输入新密码  (最少8位数字或字母)">
                    </li>
                    <li class="change_btn">
                        <button type="button" class="modify reLoginUp" style="margin-top: 24px">修改密码</button>
                    </li>
                    <li class="foot_link">
                        <span class="alink backTelLogin">返回登录</span>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.reLoginUp',
                        url: '/login/login/login-r.html',
                        params: ['reLoginTel', 'reLoginCode', 'reLoginPwd'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
        <!--手机号码注册longin-form2-->
        <div class="login_form doRegister" style="display: none;">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">注册账号</p>
                <p class="login_rtxt">已有账号？<span class="toPwdLogin">去登录</span></p>
                <ul class="log_input submit">
                    <li>
                        <input type="tel" class="inputs top_border registerTel" placeholder="请输入手机号">
                    </li>
                    <li style="position: relative">
                        <input type="text" class="inputs registerCode" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a registerClick">获取验证码</div>
                    </li>
                    <script>
                        sms({
                            click: '.registerClick',
                            telModel: '.registerTel'
                        });
                    </script>
                    <li class="eye" style="position: relative">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="password" class="inputs btm_border registerPwd" minlength="8"
                               placeholder="请输入密码  (最少8位数字或字母)">
                    </li>
                    <li class="check_btn">
                        <label class="checkbox-btn">
                            <span class="active">
                                <input type="checkbox" class="ckbtn registerOk" value="1">
                            </span>
                            我已阅读并同意
                        </label>
                        <a href="#">《亿能用户使用协议》</a>
                        及
                        <a href="#">《亿能用户服务协议》</a>
                    </li>
                    <li class="register_btn">
                        <button type="button" class="up">注册</button>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.up',
                        url: '/login/login/register.html',
                        params: ['registerTel', 'registerCode', 'registerPwd', 'registerOk'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="header">
    <!--nav-->
    <div class="navTop">
        <div class="navlogo">
            <img src="/resources/images/logo.png"/>
        </div>
        <?php if ($basisData['isGuest']): ?>
            <div class="login float_right">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <span class="goLogin">登录</span>
                /
                <span class="goRegister">注册</span>
            </div>
        <?php else: ?>
            <div class="login float_right" style="width: 190px">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <a href="/user/user/user.html"><?= $basisData['user']->tel ?></a>
                /
                <a href="/login/login/logout.html">退出</a>
            </div>
        <?php endif; ?>
        <ul class="navList">
            <?php foreach (\vendor\en\Menu::getMenu() as $v): ?>
                <li><a href="<?= $v['url'] ?>"><?= $v['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!--标题+搜索-->
    <div class="box1200">
        <!--title-->
        <div class="head_Tit">
            <div class="title_small">
                <span>省心</span>
                &nbsp;/
                <span>放心</span>
                &nbsp;/
                <span>安心</span>
            </div>
            <div class="title_big">快速投桩 亿能建桩</div>
        </div>
        <!--search-->
        <div class="search">
            <input type="text" class="search_txt float_left" placeholder="搜索场地"/>
            <button type="button" class="search_btn float_left"/>
            <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        <script>
            $('.search_btn').click(function () {
                search('.search_txt');
            });
            $(document).keypress(function (event) {
                if (event.which === 13) {
                    search('.search_txt');
                }
            });

            function search(element) {
                var params = '?search=' + $(element).val();
                window.location.href = '/index/index/list.html' + params;
            }
        </script>
    </div>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--头部end-->
<!--主体内容start-->
<div class="content">
    <!--内容1-->
    <div class="main1 box1200 marginTop80">
        <div class="big_tit">
            最新发布
        </div>
        <p class="p1">好场地那么多，最新发布抢先看 <span class="float_right span1"><a
                        href="/index/index/list.html?type=1">更多推荐</a></span>
        </p>
        <ul class="main1_ul">
            <?php foreach ($field1 as $k => $v): ?>
                <li <?= count($field1) == ($k + 1) ? 'class="marginLt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'] ?>" alt="<?= $v['title'] ?>" title="<?= $v['title'] ?>"/>
                    </a>
                    <p class="main_tit">
                        <a href="/index/index/details.html?no=<?= $v['no'] ?>" class="ma1"><?= $v['title'] ?></a>
                    </p>
                    <p class="small_tit"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                            class="sm_a"><?= $v['full_name'] ?></a>
                        <span class="price float_right"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                                           class="pra"><?= $v['budget'] ?>￥</a></span>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>

    <div class="main1 box1200 marginTop80">
        <div class="big_tit">
            融资火热
        </div>
        <p class="p1">融资建站全方位，真诚服务零距离<span class="float_right span1"><a
                        href="/index/index/list.html?type=2">更多推荐</a></span></p>
        <ul class="main1_ul">
            <?php foreach ($field2 as $k => $v): ?>
                <li <?= count($field2) == ($k + 1) ? 'class="marginLt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'] ?>" alt="<?= $v['title'] ?>" title="<?= $v['title'] ?>"/>
                    </a>
                    <p class="main_tit">
                        <a href="/index/index/details.html?no=<?= $v['no'] ?>" class="ma1"><?= $v['title'] ?></a>
                    </p>
                    <p class="small_tit"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                            class="sm_a"><?= $v['full_name'] ?></a>
                        <span class="price float_right"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                                           class="pra"><?= $v['budget'] ?>￥</a></span>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>

    <div class="main1 box1200 marginTop80">
        <div class="big_tit">
            人气最佳
        </div>
        <p class="p1">真实场地准确同步，炙手可热<span class="float_right span1"><a
                        href="/index/index/list.html?type=3">更多推荐</a></span></p>
        <ul class="main1_ul">
            <?php foreach ($field3 as $k => $v): ?>
                <li <?= count($field3) == ($k + 1) ? 'class="marginLt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'] ?>" alt="<?= $v['title'] ?>" title="<?= $v['title'] ?>"/>
                    </a>
                    <p class="main_tit">
                        <a href="/index/index/details.html?no=<?= $v['no'] ?>" class="ma1"><?= $v['title'] ?></a>
                    </p>
                    <p class="small_tit"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                            class="sm_a"><?= $v['full_name'] ?></a>
                        <span class="price float_right"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                                           class="pra"><?= $v['budget'] ?>￥</a></span>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>

    <div class="main1 box1200 marginTop80">
        <div class="big_tit">
            点击火爆
        </div>
        <p class="p1">高品质场地，从亿能开始<span class="float_right span1"><a href="/index/index/list.html?type=4">更多推荐</a></span>
        </p>
        <ul class="main1_ul">
            <?php foreach ($field4 as $k => $v): ?>
                <li <?= count($field4) == ($k + 1) ? 'class="marginLt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'] ?>" alt="<?= $v['title'] ?>" title="<?= $v['title'] ?>"/>
                    </a>
                    <p class="main_tit">
                        <a href="/index/index/details.html?no=<?= $v['no'] ?>" class="ma1"><?= $v['title'] ?></a>
                    </p>
                    <p class="small_tit"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                            class="sm_a"><?= $v['full_name'] ?></a>
                        <span class="price float_right"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                                           class="pra"><?= $v['budget'] ?>￥</a></span>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<!--主体内容end-->

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
<script type="text/javascript">
    $(function () {

    });
</script>
</body>
</html>
