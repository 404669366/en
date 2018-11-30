<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>index</title>
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
<? \vendor\helpers\Msg::run('PopupMsg') ?>
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
            <li><a href="#">首页</a></li>
            <li><a href="/index/index/list.html">业务介绍</a></li>
            <li><a href="#">成功案例</a></li>
            <li><a href="#">新闻动态</a></li>
            <li><a href="#">开放平台</a></li>
            <li><a href="#">收益预测</a></li>
            <li><a href="#">联系我们</a></li>
        </ul>
    </div>
    <!--标题+搜索-->
    <div class="box1200">
        <!--title-->
        <div class="head_Tit">
            <div class="title_small">
                <span>省心</span>
                &nbsp;/&nbsp;
                <span>放心</span>
                &nbsp;/&nbsp;
                <span>安心</span>
            </div>
            <div class="title_big">海量场地源 省心上亿能</div>
        </div>
        <!--search-->
        <div class="search">
            <input type="text" class="search_txt float_left" placeholder="请输入"/>
            <button type="button" class="search_btn float_left"/>
            <i class="fa fa-search" aria-hidden="true"></i>
            </button>

        </div>
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
        <p class="p1">好场地那么多，最新发布抢先看 <span class="float_right span1"><a href="/index/index/list.html">更多推荐</a></span>
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
                    <p class="small_tit"><a href="/index/index/details.html?no=<?= $v['no'] ?>" class="sm_a">光华逸家·3室1厅·93.89平米</a>
                        <span class="price float_right"><a href="/index/index/details.html?no=<?= $v['no'] ?>"
                                                           class="pra"><?= $v['budget'] ?>￥</a></span>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>

    <!--内容2-->
    <div class="main1 box1200 marginTop80">
        <div class="big_tit">
            融资火热
        </div>
        <p class="p1">融资建站全方位，真诚服务零距离<span class="float_right span1"><a href="#">更多推荐</a></span></p>
        <ul class="main1_ul2">
            <?php foreach ($field2 as $k => $v): ?>
                <li <?= count($field2) == ($k + 1) ? 'class="marginLt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'] ?>" alt="<?= $v['title'] ?>" title="<?= $v['title'] ?>"/>
                        <div class="resblock-desc">
                            <span class="ul2_name float_left"><?= $v['title'] ?></span>
                            <span class="ul2_price float_right"><?= $v['budget'] ?>￥</span>
                        </div>
                        <p class="ul2_smtxt float_left"><?= date('Y-m-d H:i:s', $v['created']) ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>

    <!--内容3-->
    <div class="main1 box1200 marginTop80">
        <div class="big_tit">
            人气最佳
        </div>
        <p class="p1">真实场地准确同步，炙手可热<span class="float_right span1"><a href="#">更多推荐</a></span></p>
        <ul class="main1_ul3">
            <?php foreach ($field3 as $k => $v): ?>
                <li <?= count($field3) == ($k + 1) ? 'class="marginLt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'] ?>" alt="<?= $v['title'] ?>" title="<?= $v['title'] ?>"/>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>

    <!--内容4-->
    <div class="main1 box1200 marginTop80">
        <div class="big_tit">
            点击火爆
        </div>
        <p class="p1">高品质场地，从亿能开始<span class="float_right span1"><a href="#">更多推荐</a></span></p>
        <ul class="main1_ul4">
            <?php foreach ($field4 as $k => $v): ?>
                <li <?= count($field4) == ($k + 1) ? 'class="marginLt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'] ?>" alt="<?= $v['title'] ?>" title="<?= $v['title'] ?>"/>
                        <p class="ul4_tit"><?= $v['title'] ?></p>
                        <p class="ul4_smtit">人民公园 / 1室1厅1卫
                            <span class="ul4_price float_right"><?= $v['budget'] ?>￥</span>
                        </p>
                    </a>
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
<script type="text/javascript">
    $(function () {

    });
</script>
</body>
</html>
