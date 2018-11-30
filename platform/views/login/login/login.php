<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/header.css"/>

    <!--引入index样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css"/>
    <!--引入字体-->
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
</head>
<body>
<!--手机快捷登录longin start-->
<div class="loninContaner">
    <div class="login_bg"></div>
    <!--longin-form1-->
    <div class="login_form">
        <!--login-content-->
        <div class="loginCont">
            <!--close-->
            <i class="fa fa-times" aria-hidden="true"></i>
            <p class="login_tit float_left">手机快捷登录</p>
            <p class="login_txt">别担心，无账号自动注册不会导致手机号被泄露</p>
            <form action="" method="post">
                <ul class="log_input">
                    <li>
                        <input type="text" class="inputs top_border" maxlength="11" placeholder="请输入手机号">
                    </li>
                    <li>
                        <input type="text" class="inputs" maxlength="6" placeholder="请输入验证码">
                        <img class="img_ioc float_right" src="/resources/images/yzm.png"/>
                    </li>
                    <li>
                        <input type="text" class="inputs btm_border" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a">
                            |
                            <a href="#">获取验证码</a>
                        </div>
                    </li>
                    <li class="li_btn">
                        <button type="button">登录</button>
                    </li>
                    <li class="foot_link">
                        <a class="alink" href="#">账号密码登录</a>
                        <p>登录即代表同意
                            <a href="#">《亿能隐私政策》</a>
                            及
                            <a href="#">《亿能用户服务协议》</a>
                        </p>
                    </li>
                </ul>
            </form>
            <!--清除浮动-->
            <div class="clear"></div>
        </div>
    </div>

    <!--手机号码注册longin-form2-->
    <div class="login_form" style="display: none;">
        <!--login-content-->
        <div class="loginCont">
            <!--close-->
            <i class="fa fa-times" aria-hidden="true"></i>
            <p class="login_tit float_left">手机号码注册</p>
            <p class="login_rtxt">已有账号？<a href="#">去登录</a></p>
            <form action="" method="post">
                <ul class="log_input">
                    <li>
                        <input type="text" class="inputs top_border" maxlength="11" placeholder="请输入手机号">
                    </li>
                    <li>
                        <input type="text" class="inputs" maxlength="6" placeholder="请输入验证码">
                        <img class="img_ioc float_right" src="/resources/images/yzm.png"/>
                    </li>
                    <li>
                        <input type="text" class="inputs" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a">
                            |
                            <a href="#">获取验证码</a>
                        </div>
                    </li>

                    <li class="eye">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="text" class="inputs btm_border" maxlength="8" placeholder="请输入验证码  (最少8位，数字+字母)">
                    </li>

                    <li class="check_btn">
                        <label class="checkbox-btn">
									<span class="active">
										<input type="checkbox" class="ckbtn" checked="">
									</span>
                            我已阅读并同意
                        </label>
                        <a href="#">《亿能用户使用协议》</a>
                        及
                        <a href="#">《亿能用户服务协议》</a>
                    </li>
                    <li class="register_btn">
                        <button type="button">注册</button>
                    </li>
                </ul>
            </form>
            <!--清除浮动-->
            <div class="clear"></div>
        </div>
    </div>

    <!--账号密码登录longin-form3-->
    <div class="login_form login_forms" style="display: none;">
        <!--login-content-->
        <div class="loginCont">
            <!--close-->
            <i class="fa fa-times" aria-hidden="true"></i>
            <p class="login_tit float_left">账号密码登录</p>
            <p class="login_a"></p>
            <form action="" method="post">
                <ul class="log_input">
                    <li>
                        <input type="text" class="inputs top_border num" maxlength="11" placeholder="请输入手机号">
                    </li>

                    <li class="eyes">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="password" class="inputs btm_border pwd" maxlength="6" placeholder="请输入登录密码">
                    </li>

                    <li class="forget_pwd">
                        <a href="#">忘记密码</a>
                    </li>

                    <li class="forget_btn">
                        <button type="button">登录</button>
                    </li>

                    <li class="foot_link">
                        <a class="alink" href="#">手机快捷登录</a>
                        <p>登录即代表同意
                            <a href="#">《亿能隐私政策》</a>
                            及
                            <a href="#">《亿能用户服务协议》</a>
                        </p>
                    </li>
                </ul>
            </form>
            <!--清除浮动-->
            <div class="clear"></div>
        </div>
    </div>

    <!--找回密码longin-form4-->
    <div class="login_form login_modify" style="display: none;">
        <!--login-content-->
        <div class="loginCont">
            <!--close-->
            <i class="fa fa-times" aria-hidden="true"></i>
            <p class="login_tit float_left">找回密码</p>
            <p class="login_a"></p>
            <form action="" method="post">
                <ul class="log_input">
                    <li>
                        <input type="text" class="inputs top_border" maxlength="11" placeholder="请输入手机号">
                    </li>
                    <li>
                        <input type="text" class="inputs ofst" maxlength="6" placeholder="请输入验证码">
                        <img class="img_ioc float_right" src="/resources/images/yzm.png"/>
                    </li>
                    <li>
                        <input type="text" class="inputs" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a">
                            |
                            <a href="#">获取验证码</a>
                        </div>
                    </li>

                    <li class="eye">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="text" class="inputs btm_border" maxlength="8" placeholder="请输入验证码  (最少8位，数字+字母)">
                    </li>

                    <li class="phoneNum">
                        请输入有效的手机号码
                    </li>
                    <li class="change_btn">
                        <button type="button" class="modify">修改密码</button>
                    </li>
                </ul>
            </form>
            <!--清除浮动-->
            <div class="clear"></div>
        </div>
    </div>

</div>
<!--longin end-->
</body>
</html>
