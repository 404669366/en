<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="/resources/css/login.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
    <script type="text/javascript" src="/resources/js/sms.js"></script>
    <?php \vendor\helpers\Msg::run('0.6rem') ?>
</head>
<body>
<form id="login" action="" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <div class="logo">
        <img src="/resources/images/en_logo.png" alt="">
    </div>
    <div class="loginBox">
        <span><i class="fa fa-tablet" aria-hidden="true"></i></span>
        <input type="text" class="tel" name="tel" placeholder="请输入手机号">
    </div>
    <div class="loginBox">
        <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
        <input type="text" name="code" placeholder="请输入验证码">
        <div class="yzm click">获取验证码</div>
    </div>
    <script>
        sms({
            click: '.click',
            telModel: '.tel'
        });
    </script>
    <button class="btn" type="submit">登录</button>
</form>
</body>
</html>