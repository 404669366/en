<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>基础场地</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/foundation_site.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
        <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
        <?php \vendor\helpers\Msg::run() ?>
	</head>
	<body>
		<!--header start-->
		<div class="header">
            <!--个人中心-->
            <div class="personal">
                <a href="/user/user/user.html">
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
		
		<!--content start-->
		<div class="foundation_site">
			<div class="siteList">
				<!--title-->
				<div class="userTit">  
					共发布<span><?=count($basis)?></span>个基础场地<a href="/user/release/release-basis.html"><span style="float: right;color: #3072F6">发布场地</span></a>
            	</div>
            	<!--siteCont-->
            	<div class="siteCont1">
            		<p>地理位置</p>
            		<p>详细地址</p>
            		<p>创建时间</p>
            	</div>
                <?php foreach ($basis as $v):?>
            	<div class="siteCont2">
            		<p><?=$v['full_name']?></p>
            		<p><?=$v['address']?></p>
            		<p><?=date('Y-m-d H:i:s',$v['created'])?></p>
            	</div>
                <?php endforeach;?>
			</div>
		</div>
		<!--content end-->
	</body>
</html>
