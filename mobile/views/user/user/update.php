<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>修改密码</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>getRem(true);</script>
    <?php \vendor\helpers\Msg::run('0.46rem') ?>
</head>
<body>
<div class="header">
    <a href="javascript:history.back(-1)" class="left picFont">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <a href="javascript:history.back(-1)" class="left pic">
        <span>
            <img src="/resources/img/logo.png"/>
        </span>
    </a>
    <a href="/user/user/user.html" class="right picFont">
        <i class="fa fa-user-o" aria-hidden="true"></i>
    </a>
</div>
<div class="contentBox">
    <div class="contentTitle">
        修改密码
    </div>
    <form class="contentForm" action="/user/user/modify-password.html" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input type="password" name="password" value="" placeholder="输入旧密码"/>
        <input type="password" name="password1" value="" placeholder="输入新密码"/>
        <input type="password" name="password2" value="" placeholder="请确认密码"/>
        <button type="submit">保存修改</button>
    </form>
</div>
</body>
</html>
