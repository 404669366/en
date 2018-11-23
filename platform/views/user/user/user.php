<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>user</title>
		<!--引入重置样式-->
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<!--引入公共样式-->
		<link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
		<!--引入user样式-->
		<link rel="stylesheet" type="text/css" href="/resources/css/user.css"/>
		<!--引入字体-->
		<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
	</head>
	<body>
		<!--header-->
		<div class="header">
			<div class="nav box1200">
				<img src="/resources/images/LG.png"/>
				<ul class="nva_list float_left">
					<a href="/index/index/index.html"><li>首页</li></a>
					<a href="#"><li>业务介绍</li></a>
					<a href="#"><li>成功案例</li></a>
					<a href="#"><li>新闻动态</li></a>
					<a href="#"><li>开放平台</li></a>
					<a href="#"><li>收益预测</li></a>
					<a href="#"><li>联系我们</li></a>
				</ul>
				<div class="esc">
					10**
					<a href="#">退出</a>
				</div>
				<!--清除浮动-->
				<div class="clear"></div>
			</div>
		</div>
		<!--header end-->
		
		<!--content-->
		<div class="user_cont">
			<!--左边内容-->
			<div class="user_contLt float_left">
				<img src="/resources/images/user.png"/>
				<p class="welcome">欢迎你，18****88</p>
				<ul>
					<li class="actives"><a href="#">关注场地</a></li>
					<li><a href="#">编辑资料</a></li>
				</ul>
			</div>
			
			<!--右边内容-->
			<div class="user_contRt float_right">
				
				<!--盒子里面的内容1-->
				<div class="inner_Cont" style="display: block;">
					<div class="userTit">
						共<span>0</span>套 关注房源
					</div>
					<!--tab标题-->
					<ul class="tab">
						<li class="active">二手房</li>
						<li>新房</li>
						<li>租房</li>
					</ul>
					<!--tab内容-->
					<div class="tab_cont">
						内容1
					</div>
					
					<div class="tab_cont" style="display: none;">
						内容2
					</div>
					
					<div class="tab_cont" style="display: none;">
						内容3
					</div>
				</div>
				
				<!--盒子里面的内容2-->
				<div class="inner_Cont" style="display: block;">
					<div class="userTit">
						我的账户信息
					</div>
					<!--tab标题-->
					<ul class="tab">
						<li class="active">修改昵称</li>
						<li>修改密码</li>
					</ul>
					
					<!--tab内容1-->
					<form action="/site/password/" method="post" id="updatePwd" style="display: none;">
						<ul class="change_pwd">
							<li>
								<span>输入旧密码：</span>
								<input type="password" name="password" id="password" placeholder="请输入密码" validate="notNull,minLength" validatedata="minLength=6" validatename="密码" maxlength="20">
							</li>
							<li>
								<span></span>
								<button>保存修改</button>
							</li>
						</ul>
					</form>
					
					<!--tab内容2-->
					<form action="/site/password/" method="post" id="updatePwd" style="display: none;">
						<ul class="change_pwd">
							<li>
								<span>输入旧密码：</span>
								<input type="password" name="password" id="password" placeholder="请输入密码" validate="notNull,minLength" validatedata="minLength=6" validatename="密码" maxlength="20">
							</li>
							<li>
								<span>设置新密码：</span>
								<input type="password" name="newPassword" id="password1" placeholder="请输入新密码" validate="notNull,minLength,isStandard" validatedata="minLength=8" validatename="密码" maxlength="20">
							</li>
							<li>
								<span>确认新密码：</span>
								<input type="password" placeholder="请确认新密码" validate="notNull,isSame" validatedata="isSame=#password1" validatename="确认新密码" maxlength="20">
							</li>
							<li>
								<span></span>
								<button>保存修改</button>
							</li>
						</ul>
					</form>
				</div>
				<!--清除浮动-->
				<div class="clear"></div>
			</div>
			<!--清除浮动-->
			<div class="clear"></div>
		</div>
		<!--content end-->
		
		<!--脚部start-->
		<div class="footer marginTop80">
			<div class="box1200">
				<!--合作商-->
			    <ul class="footer_nav">
			    	<li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png" /></a></li>
			    	<li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png" /></a></li>
			    	<li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png" /></a></li>
			    	<li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png" /></a></li>
			    	<li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png" /></a></li>
			    	<li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png" /></a></li>
			    	<li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png" /></a></li>
			    </ul>
			    <!--关于我们-->
		    	<ul class="footer_list">
			    	<li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
			    	<li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
			    	<li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
			    	<li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
			    	<li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
			    	<li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
			    	<li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
			    	<li><a href="#">关于我们</a></li>
				</ul>
				<!--公众号-->
				<ul class="public">
					<li><img src="/resources/images/en2.png" /></li>
					<li><img src="/resources/images/en2.png" /></li>
				</ul>
			    <!--底部版权-->
			    <p>Copyright © 2018 en.link，All Rights Reserved. 四川亿能天成科技有限公司</p>
			</div>
		</div>
		<!--脚部end-->
	</body>
</html>
