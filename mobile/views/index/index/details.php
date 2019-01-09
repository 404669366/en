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
        <a href="index.html">
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
            <?php foreach (explode(',',$model->image) as $v):?>
            <div class="swiper-slide"><img src="<?=$v?>"></div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="pagination"></div>
</div>
<script>
    new Swiper('.swiper-container',{
        pagination: '.pagination',
        loop:true,
        grabCursor: true,
        paginationClickable: true,
    });
</script>
<!--banner end-->

<!--title start-->
<div class="detTitle">
    <div class="detCont">
        <div class="tit"><?= $model->title ?></div>
        <div class="follow">
            <p class="heart">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
            </p>
            <p class="txt">关注</p>
        </div>
        <!--场地价格信息-->
        <div class="priceData">
            <div class="similar_data">
                <p class="price"><?= $model->area->full_name ?></p>
                <p class="gray">地理位置</p>
            </div>
            <div class="priceTxt">
                <p class="price"><?= $model->areas ?>m²</p>
                <p class="gray">面积</p>
            </div>
            <div class="priceTxt">
                <p class="price"><?= $model->budget ?>￥</p>
                <p class="gray">金额</p>
            </div>
        </div>
    </div>
</div>
<!--title end-->
<!--场地介绍开始-->
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
<!--场地介绍结束-->
<!--详情开始-->
<div class="agent">
    <div class="agentCont">
        <div class="one">
            <div class="venTit">
                场地配置
            </div>
            <img class="agentImg" src="<?= $model->configure_photo ?>" alt="配置单图片">
        </div>
        <div class="more">
            <div class="one">
                <div class="venTit">
                    场地配置
                </div>
                <img class="agentImg" src="<?= $model->configure_photo ?>" alt="配置单图片">
            </div>
            <div class="one">
                <div class="venTit">
                    场地配置
                </div>
                <img class="agentImg" src="<?= $model->configure_photo ?>" alt="配置单图片">
            </div>
        </div>
        <div class="viewMore">更多场地信息</div>
        <script>
            $('.viewMore').click(function () {
                if($(this).text()==='更多场地信息'){
                    $('.more').fadeIn();
                    $(this).text('收起更多信息');
                }else {
                    $(this).text('更多场地信息');
                    var top = $(window).scrollTop();
                    var moreTop =top - $('.more').height();
                    $('.more').fadeOut();
                    var t = setInterval(function(){
                        if(top <= moreTop){
                            clearInterval( t );
                        }else{
                            top -= 20;
                            $(window).scrollTop(top);
                        }
                    },5);
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
                        <p class="tit_txt"><?= $recommend['full_name'] ?>/<?= $recommend['areas'] ?>m²</p>
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
        Copyright © 2018 en.link，All Rights Reserved.
        <br/> 四川亿能天成科技有限公司
    </div>
</div>
<!--footer end-->
</body>
</html>
