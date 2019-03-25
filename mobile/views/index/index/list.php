<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>场地列表</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/list.css"/>
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
<div class="searchBox">
    <div class="searchInput">
        <div>
            <input type="text" class="searchKey" placeholder="请输入小区或商圈名称">
            <div class="searchBtn"><i class="fa fa-search" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="clickBtn">
        <div type="1" class="active">最新</div>
        <div type="2">火热</div>
        <div type="3">人气</div>
        <div type="4">点击</div>
        <div type="5">车位</div>
        <div type="6">总价</div>
    </div>
</div>
<script>
    $(function () {
        var focus = getParams('focus', 0);
        if (focus) {
            $('.searchKey').focus();
        }
        var now = getParams('type', 1);

        $('.searchKey').val(getParams('search', ''));

        $('.clickBtn>div').removeClass('active').click(function () {
            var search = $('.searchKey').val();
            window.location.href = '?search=' + search + '&type=' + $(this).attr('type');
        }).each(function (k, v) {
            if ($(this).attr('type') === now) {
                $(this).addClass('active');
            }
        });

        $('.searchBtn').click(function () {
            var search = $('.searchKey').val();
            window.location.href = '?search=' + search + '&type=' + now;
        });
    });
</script>
<div class="recommend">
    <?php foreach ($fields['data'] as $data): ?>
        <div class="one jump" url="/index/index/details.html?no=<?= $data['no'] ?>">
            <img src="<?= $data['image'][0] ?>">
            <div class="oneInfo">
                <div class="title"><?= $data['title'] ?></div>
                <div class="info"><?= $data['full_name'] ?></div>
                <div class="info"><?= $data['minimal'] ?>￥起投 / <?= $data['park'] ?>车位</div>
                <div class="price"><?= $data['budget'] ?>￥</div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="foot">
    <span>Copyright © 2018 en.ink, All Rights Reserved.<br>四川亿能天成科技有限公司</span>
</div>

</body>
</html>