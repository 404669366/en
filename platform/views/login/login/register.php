<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <!--重置样式-->
    <link rel="stylesheet" href="/resources/css/reset.css" />
    <!--引入样式-->
    <link rel="stylesheet" href="/resources/css/register.css" />
</head>
<body>
<form id="register" action="http://www.baidu.com" method="post">
    <div class="vip_form">
        <div class="form_center">
            <!--会员标题-->
            <ul class="form_top">
                <li class="vip_left">会员注册</li>
                <li class="vip_right"><a href="#">返回首页</a></li>
            </ul>
            <!--清除浮动-->
            <div class="clear"></div>
            <!--表单验证-->
            <ul class="vip_main">
                <li class="username">
                    &nbsp;用 户 名:
                    <input class="input1" type="text" name="username" placeholder="请输入你的用户名" /><span>&emsp;请不要输入中文</span>
                </li>
                <li class="username">
                    &nbsp;密&emsp;&nbsp; 码:
                    <input class="input1" type="text" name="username" placeholder="请输入你的密码" /><span>&emsp;请输入6位以上字符</span>
                </li>
                <li class="username">
                    确认密码:
                    <input class="input1" type="text" name="username" placeholder="请输入你的用户名" /><span>&emsp;两次密码要输入一致</span>
                </li>
                <li class="username">
                    &nbsp;手 机 号:
                    <input class="input1" type="text" name="username" placeholder="请确认你的密码" /><span>&emsp;填写下手机号吧，方便我们联系您！</span>
                </li>
                <li class="username">
                    &nbsp;验 证 码:
                    <input class="validate" type="text" name="username" placeholder="请输入验证码" />
                </li>
            </ul>
            <!--按钮-->
            <div class="regist_submit">
                <input class="submit" type="submit" name="submit" value="立即注册" />
            </div>
        </div>
    </div>
</form>
</div>
</body>
</html>
