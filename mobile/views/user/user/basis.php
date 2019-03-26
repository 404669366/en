<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>基础场地列表</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
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
        共发布 <?= count($basis) ?> 个基础场地
        <p class="jump" url="/user/release/release-basis.html">发布基础场地</p>
    </div>
    <div class="contentList">
        <?php foreach ($basis as $v): ?>
            <div class="one">
                <div class="oneImg"><img src="/resources/img/a1.png"></div>
                <div class="oneInfo">
                    <div class="four">详细地址: <?= $v['address'] ?></div>
                    <div class="four">地理位置: <?= $v['full_name'] ?></div>
                    <div class="four">创建时间: <?= date('Y-m-d H:i:s', $v['created']) ?></div>
                    <div class="four">场地介绍: <?= $v['intro'] ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
