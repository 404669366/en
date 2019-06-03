<html>
<head>
    <script type="text/javascript" src="/resources/js/common.js"></script>
    <style>

    </style>
</head>
<body>
<div id="bb">
    <a id="p" href="http://www.baidu.com" target="_blank">我是超级链接<button id="sub">子按钮</button></a>
</div>
<div id="text">
</div>
<?php var_dump(date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']));exit;?>
<script type="text/javascript">
$('#sub').on('click',function (e) {
    return false;
})
</script>
</body>
</html>