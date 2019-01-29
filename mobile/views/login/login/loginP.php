<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>账号密码登录</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
	    <link rel="stylesheet" type="text/css" href="/resources/css/accountLogin.css"/>
	    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
        <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/close.js" type="text/javascript" charset="utf-8"></script>
        <?php \vendor\helpers\Msg::run() ?>
	</head>
	<body>
		<!--头部开始-->
		<div class="header">
			<div class="close">
				×
			</div>
			<div class="zhuCe">
				<a href="/login/login/register.html">注册</a>
			</div>
		</div>
		<!--头部结束-->
		
		<!--主题内容开始-->
		<div class="loginCont">
			<!--titel-->
			<div class="phTit">账号密码登录</div>
			<!--form-->
            <form action="" method="post">
			<div class="form">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>">
				<!--表单验证-->
				<div class="proving1">
					<input type="number" name="loginTel" class="short_input" placeholder="请输入手机号码">
				</div>
				<div class="proving1">
					<input type="password" name="pwd" class="short_input2" placeholder="请输入密码">
				</div>
			</div>
			<!--登录按钮-->
			<div class="btn">
                <button class="loginBtn" type="submit">登录</button>
				<a href="/login/login/login-t.html">
					<span>手机快捷登录</span>
				</a>
				<a href="/login/login/login-r.html">
					<span>&nbsp;忘记密码</span>
				</a>
			</div>
            </form>
			<!--协议-->
			<div class="agree_protocol">
				注册/登录即代表同意<a href="#">《亿能隐私政策》</a>及<a href="#">《亿能用户服务协议》</a>
			</div>
		</div>
		<!--主体内容结束-->
	</body>
</html>

