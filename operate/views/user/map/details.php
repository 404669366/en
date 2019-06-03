<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表详情</title>
    <link rel="stylesheet" href="/resources/css/swiper.min.css">
    <link rel="stylesheet" href="/resources/css/details.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
    <script type="text/javascript" src="/resources/js/swiper.min.js"></script>
    <script type="text/javascript" src="/resources/js/map.js"></script>

</head>
<style>
    .nav {
        width: 10rem;
        text-align: center;
        height: 3.4rem;
        color: #fff;
        font-size: 0.45rem;
        background: rgba(0, 0, 0, 0.8);
        position: fixed;
        bottom: 1.5rem;
        left: 0;

    }

    .ch {
        width: 6rem;
        height: 0.8rem;
        text-align: center;
        margin: 0.6rem auto;
        line-height: 0.8rem;
        color: black;
        background: white;
        border: 2px solid;
        border-radius: 0.1rem;
    }
</style>
<body>
<div class="details_head">充电站&emsp;充电桩</div>
<div class="swiper-scrollbar"></div>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <!--充电站开始-->
        <div class="swiper-slide">
            <div class="station">
                <!--轮播-->
                <div class="carousel">
                    <img src="<?= explode(',', $data['model']->image)[0] ?>" alt="">
                    <p><?= $data['model']->title ?></p>
                </div>
                <!--详情-->
                <div class="detail">
                    <div class="place">
                        <p class="address"><?= $data['model']->no ?></p>
                        <p><span class="det_txt">地&emsp;址</span><?= $data['model']->address ?></p>
                        <p><span>开放时间</span> <?= $data['model']->open_time ?>时</p>
                        <p><span class="det_txt">车位</span><?= $data['model']->park ?>个</p>
                    </div>
                    <div class="charge_pile">
                        <div>
                            <p><?= $data['num'] ?></p>
                            桩数
                        </div>
                        <div>
                            <p><?= $data['gun'] ?></p>
                            充电枪
                        </div>
                        <div>
                            <p class="red_txt"><?= $data['free'] ?></p>
                            空闲充电枪
                        </div>
                    </div>
                </div>
                <!--百度地图-->
                <div class="baidu_map">
                    <div id="map"></div>
                </div>
                <script>
                    var map = new BMap.Map("map");
                    map.centerAndZoom(new BMap.Point(<?=$data['model']->lng?>,<?=$data['model']->lat?>), 13);
                    map.enableScrollWheelZoom(true);
                    map.addOverlay(new BMap.Marker(new BMap.Point(<?=$data['model']->lng?>,<?=$data['model']->lat?>)));

                </script>
                <div class="nav" style="display: none">
                    <div class="choice1 ch"><strong>百度地图</strong></div>
                    <div class="choice2 ch"><strong>高德地图</strong></div>
                </div>
                <div class="go_there"><span style="margin-right: 0.1rem"><i class="fa fa-location-arrow"
                                                                            aria-hidden="true"></i></span>到那儿去
                </div>
                <script>

                    $('.go_there').click(function () {
                        $('.nav').toggle(300);
                    });

                    (new BMap.LocalCity()).get(function (re) {
                        var from = bd09togcj02(re.center.lng, re.center.lat);
                        var to = bd09togcj02(<?=$data['model']->lng?>,<?=$data['model']->lat?>);
                        var baidu = "http://api.map.baidu.com/direction?origin=latlng:" + re.center.lat + "," + re.center.lng + "|name:当前位置&destination=latlng:<?=$data['model']->lat?>,<?=$data['model']->lng?>|name:<?= $data['model']->title ?>&origin_region=" + re.name + "&destination_region=<?=$data['model']->area->area_name?>&mode=driving&output=html&coord_type=bd09ll&src=webapp.baidu.openAPIdemo";
                        var gaode = "http://uri.amap.com/navigation?from=" + from[0] + "," + from[1] + ",当前位置" + "&to=" + to[0] + "," + to[1] + ",<?= $data['model']->title ?>&mode=car&src=nyx_super";
                        $('.choice1').click(function () {
                            window.location.href = baidu;
                        });
                        $('.choice2').click(function () {
                            window.location.href = gaode;
                        });
                    });

                    function bd09togcj02(bd_lon, bd_lat) {
                        var x_pi = 3.14159265358979324 * 3000.0 / 180.0;
                        var x = bd_lon - 0.0065;
                        var y = bd_lat - 0.006;
                        var z = Math.sqrt(x * x + y * y) - 0.00002 * Math.sin(y * x_pi);
                        var theta = Math.atan2(y, x) - 0.000003 * Math.cos(x * x_pi);
                        var gg_lng = z * Math.cos(theta);
                        var gg_lat = z * Math.sin(theta);
                        return [gg_lng, gg_lat]
                    }
                </script>
            </div>
        </div>

        <!--充电桩开始-->
        <div class="swiper-slide">
            <div class="pile">
                <ul>
                    <?php foreach ($data['data'] as $v): ?>
                        <li class="jump" url="/user/map/electricity.html?no=<?= $v['no'] ?>">
                            <div class="imgs">
                                <img src="/resources/images/csy.jpg" alt="">
                                <div class="adj_bg">
                                    <p>电流:<?= $v['current'] ?>A</p>
                                    电压:<?= $v['voltage'] ?>V
                                </div>
                            </div>
                            <p class="num_pile">编&nbsp;号: <?= $v['no'] ?></p>
                            <p class="unit_price">电&emsp;费:&nbsp;<?= $v['electrovalence'] ?>元/度</p>
                            <p class="unit_price">服务费:&nbsp;<?= $v['service'] ?>元/度</p>
                            <p class="unit_number">枪口数:<?= $v['gun'] ?> 空闲:<span class="green_txt">[<?= $v['free'] ?>
                                    ]</span></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="end">已经没有了</div>
            </div>
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper('.swiper-container', {
        scrollbar: {
            el: '.swiper-scrollbar',
            hide: true,
        },
    });
</script>
</body>
</html>