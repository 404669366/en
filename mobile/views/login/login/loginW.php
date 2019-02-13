<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>微信登录回调</title>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <?php \vendor\helpers\Msg::run() ?>
</head>
<body>
<script>
    postCall('/login/login/login-w', {_csrf: '<?=Yii::$app->request->csrfToken?>'});
</script>
</body>
</html>

