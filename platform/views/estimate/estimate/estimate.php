<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>estimate</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css"/>
    <!--引入当前样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/estimate.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/login.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/sms.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/eye.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/submit.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<? \vendor\helpers\Msg::run('PopupMsg') ?>
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
<!--banner start-->
<div class="banner">
    <div class="box1200">
        <ul class="bnner_nav">
            <a href="/index/index/index.html">
                <li>首页</li>
            </a>
            <a href="#">
                <li class="nav_active">业务介绍</li>
            </a>
            <a href="#">
                <li>成功案例</li>
            </a>
            <a href="#">
                <li>新闻动态</li>
            </a>
            <a href="#">
                <li>开放平台</li>
            </a>
            <a href="#">
                <li>收益预测</li>
            </a>
            <a href="#">
                <li>联系我们</li>
            </a>
        </ul>
        <ul class="banner_right">
            <li>
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                &nbsp;
                <?php if ($basisData['isGuest']): ?>
                    <span class="goLogin" style="cursor: pointer">登录</span>
                    /
                    <span class="goRegister" style="cursor: pointer">注册</span>
                <?php else: ?>
                    <a href="/user/user/user.html"><?= $basisData['user']->tel ?></a>
                    /
                    <a href="/login/login/logout.html">退出</a>
                <?php endif; ?>
            </li>
            <li>
                <i class="fa fa-phone-square" aria-hidden="true"></i>
                &nbsp; 热线电话：0000-0000
            </li>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<!--banner end-->

<!--head开始-->
<div class="header">
    <div class="box1200 nav_logo">
        <img src="/resources/images/logo.png"/>
        <ul class="head_list">
            <li><a href="#">我要卖场地</a></li>
            <li><a href="#" class="active">我要估价</a></li>
            <li><a href="#">我要出租</a></li>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
    <!--大标题-->
    <div class="box1200 nav_tit">
        看看我的场地值多少钱
        <p class="sub_tit">添加场地信息，查看场地估值</p>
    </div>
</div>
<!--head结束-->

<!--估价表单开始-->
<div class="m_form">
    <ul class="form_list">
        <li>
            <span class="list_names">小区</span>
            <input type="text" name="" id="" value="" placeholder="输入场地所在区域"/>
        </li>
        <li>
            <span class="list_names">建筑年代</span>
            <select name="">
                <option value="">请选择</option>
                <option value="">2008年</option>
                <option value="">2009年</option>
                <option value="">2010年</option>
                <option value="">2011年</option>
                <option value="">2012年</option>
                <option value="">2013年</option>
                <option value="">2014年</option>
                <option value="">2015年</option>
                <option value="">2016年</option>
                <option value="">2017年</option>
                <option value="">2018年</option>
            </select>
        </li>
        <li>
            <span class="list_names">面积</span>
            <input style="width: 450px;" type="text" name="" id="" value="" placeholder="输入大于零的数字"/>
            <span class="avgm">平方米</span>
        </li>
        <li>
            <span class="list_names">户型</span>
            <select name="">
                <option value="">请选择</option>
                <option value="">2008年</option>
                <option value="">2009年</option>
                <option value="">2010年</option>
                <option value="">2011年</option>
                <option value="">2012年</option>
                <option value="">2013年</option>
                <option value="">2014年</option>
                <option value="">2015年</option>
                <option value="">2016年</option>
                <option value="">2017年</option>
                <option value="">2018年</option>
            </select>
        </li>
        <li>
            <span class="list_names">朝向</span>
            <select name="">
                <option value="">请选择</option>
                <option value="">东</option>
                <option value="">南</option>
                <option value="">西</option>
                <option value="">北</option>
            </select>
        </li>
        <li>
            <span class="list_names">楼层</span>
            <select name="">
                <option value="">请选择</option>
                <option value="">东</option>
                <option value="">南</option>
                <option value="">西</option>
                <option value="">北</option>
            </select>
        </li>

        <li>
            <span class="list_names">场地特色</span>
            <ul class="inputBox">
                <li>
                    <input type="checkbox" name="" class="inputsx" id="" value=""/>
                    <span>满五</span>
                </li>
                <li>
                    <input type="checkbox" name="" class="inputsx" id="" value=""/>
                    <span>唯一</span>
                </li>
                <li>
                    <input type="checkbox" name="" class="inputsx" id="" value=""/>
                    <span>精装修</span>
                </li>
                <li>
                    <input type="checkbox" name="" class="inputsx" id="" value=""/>
                    <span>地铁房</span>
                </li>
            </ul>
        </li>
        <!--清除浮动-->
        <div class="clear"></div>
    </ul>
</div>
<!--估价表单结束-->

<!--去估价按钮-->
<div class="m_submit">
    <div class="wrap">
        <button class="btn_submit">去估价</button>
        <div class="btn_text">估值结果由亿能系统模型提供</div>
    </div>
</div>
<!--去估价按钮结束-->

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
