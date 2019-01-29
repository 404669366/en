<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>首页</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/resources/css/foot.css" />
		<link rel="stylesheet" type="text/css" href="/resources/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css" />
        <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
        <?php \vendor\helpers\Msg::run() ?>
	</head>

	<body>
		<!--head开始-->
		<div class="header">
			<div class="ico_top">
				<a href="/user/user/user.html">
					<i class="fa fa-user-o" aria-hidden="true"></i>
				</a>
			</div>
			<div class="cont">
				<div class="title_small">
					<span>专业</span> /
					<span>快速</span> /
					<span>省心</span>
				</div>
				<div class="title_text">
					<p>海量场地源 </p>
					<p>省心上亿能 </p>
				</div>
			</div>
			<!--搜索框-->
            <div class="search_box">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" placeholder="搜索场地" readonly/>
            </div>
		</div>
		<!--head结束-->

		<!--nav开始-->
		<div class="nav">
			<div class="nav_list">
				<div class="box_col" title="最新">
					<a href="/index/index/list.html?type=1">
						<div class="ico"><img src="/resources/img/icon_01.png" /></div>
						<div class="name">最新</div>
					</a>
				</div>

				<div class="box_col" title="火热">
					<a href="/index/index/list.html?type=2">
						<div class="ico"><img src="/resources/img/icon_02.png" /></div>
						<div class="name">融资</div>
					</a>
				</div>
				<div class="box_col" title="人气">
					<a href="/index/index/list.html?type=3">
						<div class="ico"><img src="/resources/img/icon_03.png" /></div>
						<div class="name">人气</div>
					</a>
				</div>
				<div class="box_col" title="点击">
					<a href="/index/index/list.html?type=4">
						<div class="ico"><img src="/resources/img/icon_04.png" /></div>
						<div class="name">点击</div>
					</a>
				</div>
				<div class="box_col" title="面积">
					<a href="/index/index/list.html?type=5">
						<div class="ico"><img src="/resources/img/icon_05.png" /></div>
						<div class="name">面积</div>
					</a>
				</div>
			</div>
		</div>
		<!--nav结束-->

		<!--常用工具开始-->
		<div class="tool">
			<!--title-->
			<h3 class="h3">常用工具</h3>
			<!--tool list-->
			<div class="mod_cont">
				<div class="tool_list" title="发布场地">
					<a href="/user/release/release-basis.html">
						<div class="lisTs"><img src="/resources/img/tool_01.png" /></div>
						<div class="listName">发布场地</div>
					</a>
				</div>
				<div class="tool_list" title="我的发布">
					<a href="/user/user/basis-field.html">
						<div class="lisTs"><img src="/resources/img/tool_02.png" /></div>
						<div class="listName">我的发布</div>
					</a>
				</div>
				<div class="tool_list" title="我的意向">
					<a href="/user/intention/list.html">
						<div class="lisTs"><img src="/resources/img/tool_03.png" /></div>
						<div class="listName">我的意向</div>
					</a>
				</div>
				<div class="tool_list" title="收益预测">
					<a href="/estimate/estimate/estimate.html">
						<div class="lisTs"><img src="/resources/img/tool_04.png" /></div>
						<div class="listName">收益预测</div>
					</a>
				</div>
				<div class="tool_list" title="客服电话">
					<a href="tel:<?=\vendor\helpers\Constant::getServiceTel()?>">
						<div class="lisTs"><img src="/resources/img/tool_09.png" /></div>
						<div class="listName">客服电话</div>
					</a>
				</div>
			</div>
		</div>
		<!--常用工具结束-->

		<!--为您推荐开始-->
		<div class="recommend">
			<!--title-->
			<h3 class="h3">
			为您推荐
				<div class="reList">
					<span class="active" type="1">最新</span>
					<span type="2">火热</span>
					<span type="3">人气</span>
					<span type="4">点击</span>
				</div>
			</h3>
			<!--推荐列表-->
			<div class="mod_cont"></div>
            <script>
                addField(1);
                $('.reList>span').click(function () {
                    $('.reList>span').removeClass('active');
                    $(this).addClass('active');
                    addField($(this).attr('type'));
                });
                function addField(type) {
                    $('.recommend>.mod_cont>div').remove();
                    $.getJSON('/index/index/data.html',{type:type},function (re) {
                        var str = '';
                        $.each(re.data,function (k,v) {
                            str += '<div class="recont">\n' +
                                '<a href="/index/index/details.html?no='+v.no+'">\n' +
                                '<div class="recimg">\n' +
                                '<img src="'+v.image+'" />\n' +
                                '</div>\n' +
                                '<div class="redadat">\n' +
                                '<p class="tit">'+v.title+'</p>\n' +
                                '<p class="tit_txt">'+v.full_name+'/'+v.areas+'m²</p>\n' +
                                '<p class="price">'+v.budget+'￥</p>\n' +
                                '</div>\n' +
                                '</a>\n' +
                                '</div>';
                        });
                        $('.recommend>.mod_cont').append(str);
                    })
                }
            </script>
			<!--查看更多-->
			<div class="viewMore">
                查看更多场地
			</div>
            <script>
                $('.viewMore').click(function () {
                    window.location.href = '/index/index/list.html?type='+$('.reList>.active').attr('type');
                });
                $('.search_box').click(function () {
                    window.location.href = '/index/index/list.html?focus=1&type='+$('.reList>.active').attr('type');
                });
            </script>
		</div>
		<!--为您推荐结束-->

		<!--footer start-->
		<div class="footer">
			<div class="footer_cont">
				Copyright © 2018 en.ink，All Rights Reserved.
				<br /> 四川亿能天成科技有限公司
			</div>
		</div>
		<!--footer end-->
	</body>
</html>