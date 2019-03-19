<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>场地详情</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/foot.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/details.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/swiper/swiper.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/map.js" type="text/javascript" charset="utf-8"></script>
    <?php \vendor\helpers\Msg::run() ?>
</head>
<body>
<!--header start-->
<div class="header">
    <div class="personal">
        <a href="javascript:history.back(-1)">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <img src="/resources/img/logo.png"/>
        </a>
        <p>
            <a href="/user/user/user.html">
                <i class="fa fa-user-o" aria-hidden="true"></i>
            </a>
        </p>
    </div>
</div>
<!--header end-->
<!--banner start-->
<div class="banner">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach (explode(',', $model->image) as $v): ?>
                <div class="swiper-slide"><img src="<?= $v ?>"></div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pagination"></div>
</div>
<script>
    new Swiper('.swiper-container', {
        pagination: '.pagination',
        loop: true,
        grabCursor: true,
        paginationClickable: true
    });
</script>
<!--banner end-->

<!--title start-->
<div class="detTitle">
    <div class="detCont">
        <div class="tit"><?= $model->title ?></div>
        <div class="follow">
            <?php if (!\vendor\en\Follow::isFollow($model->no)): ?>
                <a href="/user/follow/follow.html?no=<?= $model->no ?>">
                    <p class="heart">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </p>
                    <p class="txt">关注</p>
                </a>
            <?php else: ?>
                <a href="/user/follow/cancel.html?no=<?= $model->no ?>">
                    <p class="heart" style="color: #fa604c">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </p>
                    <p class="txt">取消关注</p>
                </a>
            <?php endif; ?>
        </div>
        <!--场地价格信息-->
        <div class="priceData">
            <div class="similar_data">
                <p class="price"><?= $model->budget ?>￥</p>
                <p class="gray">总额</p>
            </div>
            <div class="priceTxt">
                <p class="price"><?= $model->minimal ?>￥</p>
                <p class="gray">起投</p>
            </div>
            <div class="priceTxt">
                <p class="price"><?= $model->park ?></p>
                <p class="gray">车位</p>
            </div>
        </div>
    </div>
</div>

<div class="skill" style="background-size: <?= ((float)$model->financing_ratio) * 100 ?>% auto">
    当前进度: <?= ((float)$model->financing_ratio) * 100 ?>%
</div>
<?php if ($list): ?>
    <div class="venues">
        <div class="venuesCont">
            <div class="venTit">
                投资概况
            </div>
            <?php foreach ($list as $k => $v): ?>
                <div style="width: 100%;height: 3rem;line-height: 3rem;font-size: 2rem;margin-bottom: 0.4rem;: ">
                    <?= substr_replace($v['tel'], '*****', 3, 5) ?>
                    <div class="bar"
                         style="background-size: <?= round(($v['money'] / $model->budget) * 100, 2) ?>% auto">
                        <?= round(($v['money'] / $model->budget) * 100, 2) ?>%
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<div class="venues">
    <div class="venuesCont">
        <div class="venTit">
            场地介绍
        </div>
        <div class="content">
            <?= $model->intro ?>
        </div>
    </div>
</div>

<div class="agent">
    <div class="agentCont">
        <div class="one">
            <div class="venTit">
                场地配置
            </div>
            <img class="agentImg" src="<?= $model->configure_photo ? $model->configure_photo : '/resources/img/a1.png'?>" alt="配置单图片">
    </div>
        <div class="more">
            <div class="one">
                <div class="venTit">
                    预算报表
                </div>
                <?php if (!empty($model->budget_photo)):?>
                <?php foreach (explode(',', $model->budget_photo) as $k => $v): ?>
                    <img class="agentImg" src="<?= $v ?>" alt="预算报表<?= $k + 1 ?>">
                <?php endforeach; ?>
                <?php else:?>
                <img class="agentImg" src="/resources/img/a1.png" alt="预算报表">
                <?php endif;?>
            </div>
            <div class="one">
                <div class="venTit">
                    施工图纸
                </div>
                <?php if (!empty($model->field_drawing)):?>
                <?php foreach (explode(',', $model->field_drawing) as $k => $v): ?>
                    <img class="agentImg" src="<?= $v ?>" alt="施工图纸<?= $k + 1 ?>">
                <?php endforeach; ?>
                <?php else:?>
                    <img class="agentImg" src="/resources/img/a1.png" alt="施工图纸">
                <?php endif;?>

            </div>
            <div class="one">
                <div class="venTit">
                    场地备案
                </div>
                <?php if (!empty($model->record_photo)):?>
                <?php foreach (explode(',', $model->record_photo) as $k => $v): ?>
                    <img class="agentImg" src="<?= $v ?>" alt="场地备案<?= $k + 1 ?>">
                <?php endforeach; ?>
                <?php else:?>
                    <img class="agentImg" src="/resources/img/a1.png" alt="场地备案">
                <?php endif;?>
            </div>
        </div>
        <div class="viewMore">更多场地信息</div>
        <script>
            $('.viewMore').click(function () {
                if ($(this).text() === '更多场地信息') {
                    $('.more').fadeIn();
                    $(this).text('收起更多信息');
                } else {
                    $(this).text('更多场地信息');
                    var top = $(window).scrollTop();
                    var moreTop = top - $('.more').height();
                    $('.more').fadeOut();
                    var t = setInterval(function () {
                        if (top <= moreTop) {
                            clearInterval(t);
                        } else {
                            top -= 20;
                            $(window).scrollTop(top);
                        }
                    }, 5);
                }
            });
        </script>
    </div>
</div>
<!--详情结束-->

<!--map start-->

<div class="map" id="map"></div>
<script>
    var map = new BMap.Map('map');
    var point = new BMap.Point('<?=$model->lng?>' || 116.404, '<?=$model->lat?>' || 39.915);
    map.centerAndZoom(point, 16);
    map.addOverlay(new BMap.Marker(point));
    map.addControl(new BMap.NavigationControl({
        anchor: BMAP_ANCHOR_TOP_RIGHT,
        type: BMAP_NAVIGATION_CONTROL_SMALL
    }));
</script>
<style>
    .anchorBL {
        display: none !important;
    }
</style>
<div class="broker">
    <div class="agent identInfo">
        <span><img src="/resources/img/agent_none.png"/><br><?= $model->cobber->ident->name ?></span>
    </div>
    <div class="buttons">
        <span>
            <button type="button" class="haveIntent" style="background:#3bc48b;margin-right: 2rem">有意向</button>
            <a href="tel:<?= $model->cobber->tel ?>">打电话</a>
        </span>
    </div>
</div>

<div class="intent">
    <div>
        <span>
            <div class="intentInfo">
                <div class="intentTitle">我的意向</div>
                <form action="/user/intention/add.html?no=<?= $model->no ?>" method="post">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <input type="text" name="money" placeholder="意向金额" class="intentMoney">
                    <button type="submit" class="intentButton">提交意向</button>
                </form>
                <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
        </span>
    </div>
</div>
<script>
    $('.haveIntent').click(function () {
        $('.intent').fadeIn();
    });
    $('.intent .close').click(function () {
        $('.intent').fadeOut();
    });
    $('.identInfo').click(function () {
        window.location.href = '/index/index/cobber-field.html?cobber_id=<?=$model->cobber_id?>';
    });
</script>
<!--map end-->

<!--猜你喜欢开始-->
<div class="guesUlike">
    <div class="mod_cont">
        <!--title-->
        <div class="guseTit">
            更多推荐
        </div>
        <?php foreach ($recommends as $recommend): ?>
            <div class="recont">
                <a href="/index/index/details.html?no=<?= $recommend['no'] ?>">
                    <div class="recimg">
                        <img src="<?= $recommend['image'][0] ?>"/>
                    </div>
                </a>
                <a href="/index/index/details.html?no=<?= $recommend['no'] ?>">
                    <div class="redadat">
                        <p class="tit"><?= $recommend['title'] ?></p>
                        <p class="tit_txt"><?= $recommend['full_name'] ?></p>
                        <p class="tit_txt"><?= $recommend['minimal'] ?>￥起投 / <?= $recommend['park'] ?>车位<</p>
                        <p class="price"><?= $recommend['budget'] ?>￥</p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--猜你喜欢结束-->

<!--帮我卖场地开始-->
<div class="helpSell">
    <div class="helpCont">
        <h2>空闲场地如何处理？我们可以帮到你</h2>
        <div class="helpBtn">
            <a href="/user/release/release-basis.html">发布我的场地</a>
        </div>
    </div>
</div>
<!--帮我卖场地结束-->

<!--footer start-->
<div class="footer">
    <div class="footer_cont">
        Copyright © 2018 en.ink，All Rights Reserved.
        <br/> 四川亿能天成科技有限公司
    </div>
</div>
<div class="nullBox"></div>
<!--footer end-->
</body>
</html>
