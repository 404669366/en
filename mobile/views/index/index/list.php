<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>场地列表</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css" />
		<link rel="stylesheet" type="text/css" href="/resources/css/foot.css" />
		<link rel="stylesheet" type="text/css" href="/resources/css/list.css" />
		<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css" />
        <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
        <?php \vendor\helpers\Msg::run() ?>
	</head>

	<body>
		<!--header start-->
		<div class="header">
			<div class="personal">
				<a href="/index/index/index.html">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					<img src="/resources/img/logo.png" />
				</a>
				<p>
                    <a href="/user/user/user.html">
					    <i class="fa fa-user-o" aria-hidden="true"></i>
                    </a>
				</p>
			</div>
		</div>
		<!--header end-->

		<!--search start-->
		<div class="search">
			<div class="inputBox">
				<i class="fa fa-search" aria-hidden="true"></i>
				<input type="text" placeholder="请输入小区或商圈名称">
			</div>
		</div>
		<!--search end-->

		<!--Slide list start-->
		<div class="slideList">
			<div class="slits">
				<a href="?type=1"><span>最新</span></a>
				<a href="?type=2"><span>融资</span></a>
				<a href="?type=3"><span>人气</span></a>
				<a href="?type=4"><span>点击</span></a>
				<a href="?type=5"><span>面积</span></a>
				<a href="?type=6"><span>总价</span></a>
			</div>
		</div>
        <script>
            $(function () {
               var now = getParams('type',1);
               $('.slits span').removeClass('active');
               $.each($('.slits>a'),function (k,v) {
                   if($(this).attr('href')==='?type='+now){
                       $(this).find('span').addClass('active');
                   }
               });
            });
        </script>
		<!--Slide list end-->

		<!--main start-->
		<div class="recommend">
			<!--列表-->
			<div class="mod_cont">
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">212万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">216万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">232万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">252万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">215万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>

				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
				<div class="recont none_border">
					<a href="#">
						<div class="recimg">
							<img src="/resources/img/list_01.jpg" />
						</div>
						<div class="redadat">
							<p class="tit">此场地已满两年，无增值税</p>
							<p class="tit_txt">3室1厅/90.33m²m²/南/外光华</p>
							<p class="price">222万</p>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!--main end-->

		<!--footer start-->
		<div class="footer">
			<div class="footer_cont">
				Copyright © 2018 en.link，All Rights Reserved.
				<br /> 四川亿能天成科技有限公司
			</div>
		</div>
		<!--footer end-->
	</body>
</html>