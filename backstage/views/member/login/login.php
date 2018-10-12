<?php
\app\assets\LoginAsset::register($this);
\app\assets\LoginAsset::offDeBug();
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>登录</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->
    <?php $this->head(); ?>
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>
</head>
<body class="signin">
<?php $this->beginBody(); ?>
<?php $this->endBody(); ?>
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>[ H+ ]</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用后台</h4>
            </div>
        </div>
        <div class="col-sm-5">
            <form method="post" action="">
                <h4 class="no-margins">登录：</h4>
                <input type="text" class="form-control uname" placeholder="用户名"/>
                <input type="password" class="form-control pword" placeholder="密码"/>
                <div>
                    <input type="text" class="form-control ji m-b" placeholder="验证码"/>
                    <img class="form-control code" src="/member/login/code" onclick="this.src+='?'+Math.random()">
                </div>
                <button class="btn btn-success btn-block">登录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; 2018 - 2099
        </div>
    </div>
</div>
</body>
</html>
<?php $this->endPage() ?>
