<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>发布真实场地</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
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
        发布真实场地
    </div>
    <form class="contentForm" action="/user/release/add.html" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input type="text" name="tel" placeholder="请填写场地方电话"/>
        <input type="text" name="title" placeholder="请填写场地标题"/>
        <input type="text" class="area" readonly placeholder="请选择: 省>市>区/县"/>
        <input type="text" name="address" placeholder="请填写详细地址"/>
        <input type="text" class="intro" readonly placeholder="请填写场地介绍"/>
        <input type="text" class="image" readonly placeholder="场地图片: 点击上传"/>
        <button type="submit">确认提交</button>
    </form>
    <script>
        window.area().load('.area', 'area_id');
        window.intro().load('.intro', 'intro');
        window.uploadImg().load('.image', 'image', 6);
    </script>
</div>
</body>
</html>
