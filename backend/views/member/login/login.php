<?php
\app\assets\LoginAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>亿能科技 - 登录</title>
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
<?php \vendor\helpers\Msg::run()?>
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>[ EN ]</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用亿能科技后台</h4>
            </div>
        </div>
        <div class="col-sm-5">
            <form method="post" action="">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>"/>
                <h4 class="no-margins">登录：</h4>
                <input type="text" class="form-control uname" name="username" placeholder="用户名"/>
                <input type="password" class="form-control pword" name="pwd" placeholder="密码"/>
                <div>
                    <input type="text" class="form-control ji m-b" name="code" placeholder="验证码"/>
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
