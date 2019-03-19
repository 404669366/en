<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>认证合伙人</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>getRem(true);</script>
    <script src="/resources/js/form.js" type="text/javascript" charset="utf-8"></script>
    <?php \vendor\helpers\Msg::run('0.46rem') ?>
</head>
<body>
<div class="header">
    <a href="javascript:history.back(-1)" class="pic">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <img src="/resources/img/logo.png"/>
    </a>
    <a href="/user/user/user.html" class="pic">
        <i class="fa fa-user-o" aria-hidden="true"></i>
    </a>
</div>

<div class="contentBox">
    <div class="contentTitle">
        发布场地
    </div>
    <form class="contentForm" action="/user/release/add-basis.html" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input type="text" class="area" placeholder="请选择: 省>市>区/县"/>
        <input type="text" name="address" placeholder="请填写详细地址"/>
        <input type="text" class="intro" placeholder="请填写场地介绍"/>
        <button type="submit">确认提交</button>
    </form>
    <script>
        window.area().load('.area', 'area_id');
        window.intro().load('.intro', 'intro');
    </script>
</div>
</body>
</html>
