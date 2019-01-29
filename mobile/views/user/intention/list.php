<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的意向</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/foundation_site.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
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
		<style>
            .siteList p{
                width: 25%!important;
            }
        </style>
		<!--content start-->
		<div class="foundation_site">
			<div class="siteList">
				<!--title-->
				<div class="userTit">  
					共有<span><?=count($data)?></span>条意向
            	</div>
            	<!--siteCont-->
            	<div class="siteCont1">
            		<p>场地编号</p>
            		<p>意向编号</p>
            		<p>意向金额</p>
            		<p>创建时间</p>
            	</div>
                <?php foreach ($data as $v):?>
            	<div class="siteCont2">
            		<p><a href="/index/index/details.html?no=<?= $v['field_no'] ?>"><?=$v['field_no']?></a></p>
            		<p><?=$v['no']?></p>
            		<p><?=$v['money']?></p>
            		<p><?=date('Y-m-d H:i:s',$v['created'])?></p>
            	</div>
                <?php endforeach;?>
			</div>
		</div>
		<!--content end-->
	</body>
</html>
