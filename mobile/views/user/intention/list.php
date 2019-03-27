<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>我的意向列表</title>
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
    <div class="contentTitle">共有<span> <?= count($data) ?> </span>条意向</div>
    <div class="contentList">
        <?php foreach ($data as $v): ?>
            <div class="one jump" url="/index/index/details.html?no=<?= $v['field_no'] ?>">
                <div class="oneImg"><img src="<?= explode(',', $v['image'])[0] ?>"></div>
                <div class="oneInfo">
                    <div class="four">意向编号: <?= $v['no'] ?></div>
                    <div class="four">场地编号: <?= $v['field_no'] ?></div>
                    <div class="four">创建时间: <?= date('Y-m-d H:i:s', $v['created']) ?></div>
                    <div class="four">意向金额:
                        <span><?= $v['money'] ?>&yen;</span>
                        /
                        <?= \vendor\helpers\Constant::getIntentionStatus()[$v['status']] ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
