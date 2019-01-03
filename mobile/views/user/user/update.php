<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改密码</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/change_pwd.css"/>
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
		
		<!--change_spassword start-->
		<div class="password">
			<div class="pwdBox">
				<div class="pwdTit">
					修改密码
				</div>
                <form action="/user/user/modify-password.html" method="post"></form>
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>">
					<div class="oldPwd">
						<span>输入密码:</span>
						<input type="password" name="password" value="" placeholder="输入密码"/>
					</div>
					<div class="oldPwd">
						<span>输入新密码:</span>
						<input type="password" name="password1" value="" placeholder="输入新密码"/>
					</div>
					<div class="oldPwd">
						<span>请确认密码:</span>
						<input type="password" name="password2" value="" placeholder="请确认密码"/>
					</div>
					
					<div class="oldPwd">
						<button type="submit">保存修改</button>
					</div>
			</div>
		</div>
		<!--change_spassword end-->
		
	</body>
</html>
