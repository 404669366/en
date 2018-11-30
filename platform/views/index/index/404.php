<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入404样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/404.css"/>
    <!--引入jquery-->
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<? \vendor\helpers\Msg::run('PopupMsg') ?>
<div class="not_find">
    <img src="/resources/images/404.jpg"/>
    <div class="notMain" id="notMain">10秒后页面将跳转到首页...</div>
    <div class="notBtn">
        <a href="/index/index/index.html">立即跳转...</a>
    </div>
</div>
</body>

<!--倒计时开始-->
<script type="text/javascript">
    //初始值10
    var num = 10;
    var id = setInterval(function () {
        num--;//不断 递减
        //找到该元素对象
        document.getElementById('notMain').innerText = num + "秒后页面将跳转到首页...";
        //判断
        if (num == 0) {
            //清除计时器
            clearInterval(id);
            //跳转到首页
            location.href = "/index/index/index.html";
        }
    }, 1000);
</script>
<!--倒计时结束-->

</html>
