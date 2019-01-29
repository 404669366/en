<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册账号</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
	    <link rel="stylesheet" type="text/css" href="/resources/css/registered.css"/>
	    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
        <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/sms.js" type="text/javascript" charset="utf-8"></script>
        <?php \vendor\helpers\Msg::run() ?>

	</head>
	<body>
		<!--头部开始-->
		<div class="header">
			<div class="return">
				<a href="/login/login/login-t.html">
					<
				</a>
			</div>
			<div class="zhuCe">
				注册账号
			</div>
		</div>
		<!--头部结束-->
		
		<!--主体内容开始-->
		<div class="loginCont">
			<!--form-->
            <form action="" method="post">
                <div class="form">
                    <!--表单验证-->
                    <div class="proving1">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>">
                        <input type="number" name="loginTel" class="short_input1 loginTel" placeholder="请输入手机号码">
                        <a class="telLoginClick">发送验证码</a>
                        <script>
                            sms({
                                click: '.telLoginClick',
                                telModel: '.loginTel'
                            });
                        </script>
                    </div>
                    <div class="proving1">
                        <input type="number" name="loginCode" class="short_input2" placeholder="请输入验证码">
                    </div>

                    <div class="proving1">
                        <input type="password" name="loginPwd" class="short_input2" placeholder="请输入密码（最少8位）" minlength="8">
                    </div>
                </div>
                <!--登录按钮-->
                <div class="btn">
                    <button class="loginBtn" type="submit">确认提交</button>
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
