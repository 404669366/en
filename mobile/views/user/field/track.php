<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>场地跟踪</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/site_tracking.css"/>
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
		<!--main start-->
		<div class="main">
			<div class="mainList">
				<!--title-->
				<div class="mainTit">
                	共<span><?=count($field)?></span>个真实场地
                	<span style="float: right;"><a href="/user/field/rob.html"> 抢单(<?= \vendor\helpers\redis::app()->lLen('BackendField') ?>)</a></span>
				</div>
				<!--列表内容-->
                <?php foreach ($field as $v):?>
				<div class="listCont">
                    <img src="<?= explode(',', $v['image'])[0] ?>"/>
                    <div class="information">
                        <p><span>场地编号:</span><?= $v['no'] ?></p>
                        <p><span>场地地域:</span><?= $v['full_name'] ?></p>
                        <p><span>详细地址:</span><?= $v['address'] ?></p>
                        <p><span>发布时间:</span><?= date('Y-m-d H:i:s', $v['created']) ?></p>
                        <p><span>场地状态:</span><?= \vendor\helpers\Constant::getFieldStatus()[$v['status']] ?></p>
                        <p style="color: red;font-size: 3rem"><?= $v['budget'] ?><span class="small">&yen;</span></p>
                    </div>
					<a href="/user/field/detail.html?no=<?= $v['no'] ?>" class="cancel">详情</a>
				</div>
                <?php endforeach;?>
			</div>
		</div>
		<!--main end-->
	</body>
</html>
