<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>关注场地</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/attention_field.css"/>
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

		<!--main start-->
		<div class="main">
			<div class="mainList">
				<!--title-->
				<div class="mainTit">
                	共<span><?=count($follow)?></span>个 关注场地
				</div>
				<?php foreach ($follow as $v):?>
				<div class="listCont">
					<a href="/index/index/details.html?no=<?= $v['no'] ?>">
						<img src="<?=explode(',',$v['image'])[0]?>"/>
						<div class="information">
							<p><span>场地编号:</span><?= $v['no'] ?></p>
							<p><span>场地地域:</span><?= $v['full_name'] ?></p>
							<p><span>关注时间:</span><?=date('Y-m-d H:i:s',$v['created'])?></p>
							<p style="color: red;"><?= $v['budget'] ?><span class="small">&yen;</span></p>
						</div>
					</a>
					<a href="/user/follow/cancel.html?no=<?= $v['no'] ?>" class="cancel">
						取消关注
					</a>
				</div>
                <?php endforeach;?>
			</div>
		</div>
		<!--main end-->
	</body>
</html>
