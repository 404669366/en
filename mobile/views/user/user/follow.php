<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>关注场地列表</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/centerList.css"/>
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
    <div class="contentTitle">共关注<span> <?= count($follow) ?> </span>个场地</div>
    <div class="contentList">
        <?php foreach ($follow as $v): ?>
            <div class="one jump" url="/index/index/details.html?no=<?= $v['no'] ?>">
                <div class="oneImg"><img src="<?= explode(',', $v['image'])[0] ?>"></div>
                <div class="oneInfo">
                    <div class="four">场地编号: <?= $v['no'] ?></div>
                    <div class="four">场地地域: <?= $v['full_name'] ?></div>
                    <div class="four">关注时间: <?= date('Y-m-d H:i:s', $v['created']) ?></div>
                    <div class="four">场地总额: <span><?= $v['budget'] ?>&yen;</span></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
