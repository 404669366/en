<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人中心</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
	    <link rel="stylesheet" type="text/css" href="/resources/css/personal.css"/>
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
				<a href="/index/index/index.html">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					<img src="/resources/img/logo.png"/>
				</a>
				<p>
					<i class="fa fa-user-o" aria-hidden="true"></i>
				</p>
			</div>
			<!--用户-->
			<div class="userLogin">
				<img src="/resources/img/user.png"/>
                <span class="username"><?=Yii::$app->user->identity->tel?></span>
			</div>
		</div>
		<!--header end-->
		
		<!--main start-->
		<div class="main">
			<!--列表内容-->
			<div class="mainBox">
				<a href="/user/user/follow.html">
					<div class="mainLeft">
						<i class="fa fa-star-half-o" aria-hidden="true"></i>
					</div>
					<div class="mainRit">
						关注场地
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			<div class="mainBox">
				<a href="/user/user/basis-field.html">
					<div class="mainLeft" style="color: #84CB7F;">
						<i class="fa fa-gavel" aria-hidden="true"></i>
					</div>
					<div class="mainRit">
						基础场地
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			<div class="mainBox">
				<a href="/user/intention/list.html">
					<div class="mainLeft" style="color: #7FD1CC;">
						<i class="fa fa-thumb-tack" aria-hidden="true"></i>
					</div>
					<div class="mainRit">
						我的意向
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			<div class="mainBox">
				<a href="#">
					<div class="mainLeft" style="color:#FFCE44;">
						<i class="fa fa-paper-plane" aria-hidden="true"></i>
					</div>
					<div class="mainRit">
						发布真实场地
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			<div class="mainBox">
				<a href="/user/field/track-field.html">
					<div class="mainLeft" style="color:#DE5448;">
						<i class="fa fa-video-camera" aria-hidden="true"></i>
					</div>
					<div class="mainRit">
						场地跟踪
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			<div class="mainBox">
				<a href="/user/intention/manage.html">
					<div class="mainLeft" style="color:#6DB8F7;">
						<i class="fa fa-hourglass-half" aria-hidden="true"></i>
					</div>
					<div class="mainRit">
						意向管理
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			<div class="mainBox">
				<a href="/user/user/update.html">
					<div class="mainLeft" style="color:#17A05E;">
						<i class="fa fa-unlock" aria-hidden="true"></i>
					</div>
					<div class="mainRit">
						修改密码
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			<div class="mainBox">
				<a href="/user/ident/ident.html">
					<div class="mainLeft" style="color: #4371FB;">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div>
					<div class="mainRit none_border">
						认证合伙人
						<p class="gt">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</p>
					</div>
				</a>
			</div>
			
			
		</div>
		<!--main end-->
		
		<!--Logout start-->
		<div class="logout">
			<a href="/login/login/logout.html">
				<button>退出登录</button>
			</a>
		</div>
		<!--Logout end-->
	</body>
</html>
