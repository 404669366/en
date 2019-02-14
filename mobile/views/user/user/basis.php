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
                <a href="javascript:history.back(-1)">
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
        <div class="foundation_site_new">
            <div class="userTit">
                共发布<span><?=count($basis)?></span>个基础场地<a href="/user/release/release-basis.html"><span style="float: right;color: #3072F6">发布基础场地</span></a>
            </div>
            <div class="siteListNew">
                <?php foreach ($basis as $v):?>
                <div class="siteCont">
                    <div class="siteListTitle">
                        <span class="fLeft">详细地址: <?=$v['address']?></span>
                        <span class="fRight siteListClick"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    </div>
                    <div class="siteListCount">
                        <div class="siteListCountInfo">地理位置: <?=$v['full_name']?></div>
                        <div class="siteListCountInfo">创建时间: <?=date('Y-m-d H:i:s',$v['created'])?></div>
                        <div>场地介绍: <?=$v['intro']?></div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <script>
            $('.siteListNew').on('click','.siteListClick',function () {
                if($(this).find('i').hasClass('fa-chevron-down')){
                    $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
                    $(this).parents('.siteCont').find('.siteListCount').fadeIn();
                }else {
                    $(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                    $(this).parents('.siteCont').find('.siteListCount').hide();
                }
            });
        </script>
	</body>
</html>
