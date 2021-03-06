<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表</title>
    <link rel="stylesheet" href="/resources/css/list.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
    <script type="text/javascript" src="/resources/js/map.js"></script>
</head>
<body>
<script>
    function getData(cityName, lng, lat) {
        $.getJSON('/user/map/data.html', {city: cityName, lng: lng, lat: lat}, function (re) {
            console.log(re);
            var provinces = '';
            var province = '';
            $.each(re.data.provinces, function (k, v) {
                if (re.data.province == v.area_id) {
                    province = v.area_name;
                    provinces = '<li area_id="' + v.area_id + '" class="hover">' + v.area_name + '</li>' + provinces;
                } else {
                    provinces += '<li area_id="' + v.area_id + '">' + v.area_name + '</li>';
                }
            });
            $('.province').html(provinces).prev().text(province);
            var citys = '';
            var city = '';
            $.each(re.data.citys, function (k, v) {
                if (re.data.city == v.area_id) {
                    city = v.area_name;
                    citys = '<li area_id="' + v.area_id + '" class="hover">' + v.area_name + '</li>' + citys;
                } else {
                    citys += '<li area_id="' + v.area_id + '">' + v.area_name + '</li>';
                }
            });
            $('.city').html(citys).prev().text(city);


        })
    }

    function getAll(city, lng, lat, parking_fee=0, type=0, standard=0) {
        $('.no').siblings().remove();
        $.getJSON('/user/map/data.html', {
            'city': city,
            'lng': lng,
            'lat': lat,
            'parking_fee': parking_fee,
            'type': type,
            'standard': standard
        }, function (re) {
            var info = '';
            $.each(re.data.field, function (k, v) {
                info += '<a href="/user/map/details.html?no=' + k + '">' +
                    '<li>' +
                    '<p class="list_num">' + k + '</p>' +
                    '<p class="list_tit">' + v.title + '</p>' +
                    '<p class="list_charge">' +
                    '<span class="quick_charge">' +
                    '枪口' +
                    '<span class="green_txt">[' + v.gun + ']</span>' +
                    '空闲' +
                    '<span class="red_txt">[' + v.free + ']</span>' +
                    '</span>' +
                    '<span style="font-size: 0.4rem;color: #909090">' + '<i class="fa fa-map-marker" aria-hidden="true">' + '</i>' + '</span>' +
                    v.distance +
                    'km</p>' +
                    '</li>' +
                    '</a>';
            });
            $('.no').before(info);
        });
    }

    var city = '';
    var lng = '';
    var lat = '';
    (new BMap.LocalCity()).get(function (re) {
        lng = re.center.lng;
        lat = re.center.lat;
        city = re.name;
        getData(city, lng, lat);
        getAll(city, lng, lat);
    });
</script>
<div class="head">
    <div class="tab">
        <div class="fl area">
            地域
            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
        </div>
        <div class="fr select">
            筛选
            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
        </div>
    </div>
    <!--city_list城市选项-->
    <div class="city_list" style="display: none;font-size: 0.42rem">
        <div class="list_left fl mar_left">
            <p>省</p>
            <ul class="province"></ul>
        </div>
        <div class="list_left fr mar_right">
            <p>市</p>
            <ul class="city"></ul>
        </div>
        <script>
            $('.province').on('click', 'li', function () {
                $(this).addClass('hover').siblings().removeClass('hover');
                $('.province').prev().text($(this).text());
                $('.city').html('').prev().text('市');
                $.getJSON('/user/map/area.html', {area_id: $(this).attr('area_id')}, function (re) {
                    var citys = '';
                    var city = '';
                    $.each(re.data, function (k, v) {
                        if (k === 0) {
                            city = v.area_name;
                            citys = '<li area_id="' + v.area_id + '" class="hover">' + v.area_name + '</li>' + citys;
                        } else {
                            citys += '<li area_id="' + v.area_id + '">' + v.area_name + '</li>';
                        }
                    });
                    $('.city').html(citys).prev().text(city);
                });
            });
            $('.city').on('click', 'li', function () {
                $(this).addClass('hover').siblings().removeClass('hover');
                $('.city').prev().text($(this).text());
                $('.area').click();
                getData($(this).text(), lng, lat);
                getAll($(this).text(), lng, lat);
            });
        </script>
    </div>
    <!--screen筛选项-->
    <div class="city_right" style="display: none">
        <ul class="screen">
            <p class="let_sp">偏好</p>
            <li class="mar_right  parking_fee" parking_fee="1">无停车费</li>
            <li class="parking_fee" parking_fee="2">有停车费</li>
        </ul>
        <ul class="screen screen_itm">
            <p>电桩类型</p>
            <li class="mar_right mr_btm type" ModelType="1">慢充</li>
            <li class="mr_btm type" ModelType="2">快充</li>
            <li class="mar_right type" ModelType="3">均充</li>
            <li class="type" ModelType="4">轮充</li>
        </ul>
        <ul class="screen screen_itm">
            <p>电桩标准</p>
            <li class="mar_right mr_btm standard" ModelStandard="1">国标2011</li>
            <li class="mr_btm standard" ModelStandard="2">国标2015</li>
        </ul>

        <!-- 保存并提交-->
        <div class="submit">
            <span class="fl" style="font-size: 0.75rem;margin-right: 0.1rem;"><i class="fa fa-circle-thin"
                                                                                 aria-hidden="true"
                                                                                 style="display: none"></i></span>
            <span class="fl" style="display: none">保存偏好设置</span>
            <button class="fr up">筛选</button>
            <script>
                $('.area').click(function () {
                    $(".city_list").toggle();
                    $(".city_right").hide();
                    if ($(this).find('i').hasClass('fa-angle-down')) {
                        $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
                    } else {
                        $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
                    }
                    $('.select').find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
                });
                $('.select').click(function () {
                    $(".city_right").toggle();
                    $(".city_list").hide();
                    if ($(this).find('i').hasClass('fa-angle-down')) {
                        $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
                    } else {
                        $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
                    }
                    $('.area').find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
                });
                var parking_fee = '';
                var type = '';
                var standard = '';
                $('.type').click(function () {
                    $(this).addClass('activ').siblings().removeClass('activ');
                    type = $(this).attr('ModelType');
                });
                $('.parking_fee').click(function () {
                    $(this).addClass('activ').siblings().removeClass('activ');
                    parking_fee = $(this).attr('parking_fee');

                });
                $('.standard').click(function () {
                    $(this).addClass('activ').siblings().removeClass('activ');
                    standard = $(this).attr('ModelStandard');
                });
                $('.up').click(function () {
                    getAll(city, lng, lat, parking_fee, type, standard);
                    $('.select').click();
                });
            </script>
        </div>
    </div>
</div>

<ul class="list">
    <div class="no">已经没有啦</div>
</ul>

<div class="switchBox jump" url="/user/map/map.html">
    <p><i class="fa fa-globe" aria-hidden="true"></i></p>
    地图
</div>
</body>
</html>