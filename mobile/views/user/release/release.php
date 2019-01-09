<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>发布场地</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/release_venue.css"/>
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
		
		<!--certified_Partners start-->
		<div class="certified">
			<div class="partnersBox">
				<div class="partnersTit">
                    发布场地
				</div>
				<div class="oldPwd">
					<span>场地方电话:</span>
					<input type="text" name="" id="" value="" placeholder="请填写场地方电话"/>
				</div>
				<div class="oldPwd">
					<span>场地标题:</span>
					<input type="text" name="" id="" value="" placeholder="请填写场地标题"/>
				</div>
				<div class="oldPwd">
					<span>场地地域:</span>
					<select>
						<option value="">-- 省份 --</option>
						<option value="110000">北京市</option>
						<option value="110000">北京市</option>
						<option value="110000">北京市</option>
					</select>
					<select>
						<option value="">-- 城市 --</option>
					</select>
					<select>
						<option value="">-- 区县 --</option>
					</select>
				</div>
				<div class="oldPwd">
					<span>详细地址:</span>
					<input type="text" name="" id="" value="" placeholder="请填写详细地址"/>
				</div>
				<!--场地介绍-->
				<div class="field_info">
					<p class="fieldTit">场地介绍:</p>
					<textarea class="field_cont" placeholder="请填写场地介绍"></textarea>
				</div>
				<!--场地图片-->
				<div class="field_info">
					<p class="fieldTit">场地图片:</p>
					<p class="field_img"></p>
				</div>
			
			</div>
		</div>
		<!--certified_Partners end-->
	</body>
</html>
