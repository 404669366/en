<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>认证合伙人</title>
		<link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/certified_partners.css"/>
		<link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
        <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/resources/js/area.js" type="text/javascript" charset="utf-8"></script>
        <script src="/upload/h5-upload.js" type="text/javascript" charset="utf-8"></script>
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

		<!--certified_Partners start-->
		<div class="certified">
			<div class="partnersBox">
				<div class="partnersTit">
					认证合伙人
				</div>
                <?php if(!$model):?>
                    <form action="/user/ident/add-ident.html" method="post">
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                        <input type="hidden" name="now_type" value="1">
                        <div class="oldPwd area">
                            <span>场地地域:</span>
                            <select class="province"
                                    style="width: auto;text-align: center;text-align-last: center"></select>
                            <select class="city"
                                    style="width: auto;text-align: center;text-align-last: center"></select>
                            <select class="county"
                                    style="width: auto;text-align: center;text-align-last: center"></select>
                        </div>
                        <div class="oldPwd">
                            <span>详细地址:</span>
                            <input type="text" name="address" placeholder="请填写详细地址"/>
                        </div>
                        <div class="oldPwd">
                            <span>银行类型:</span>
                            <select name="bank_type">
                                <?php foreach (\vendor\helpers\Constant::getBankType() as $k => $v): ?>
                                    <option value="<?= $k ?>"><?= $v ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="oldPwd">
                            <span>银行卡号:</span>
                            <input type="text" name="bank_no" placeholder="请填写收款银行卡号"/>
                        </div>
                        <div class="oldPwd">
                            <span>真实姓名:</span>
                            <input type="text" name="name" placeholder="请填写真实姓名"/>
                        </div>
                        <!--上传ID card正面-->
                        <div class="idcard card_positive">
                            <p class="idTit">身份证正面:<button type="button" class="add">添加图片</button></p>
                            <p class="id_img"></p>
                            <script>
                                h5Upload({
                                    element:'.card_positive',
                                    name:'card_positive',
                                    click:'.add',
                                    box:'.id_img'
                                });
                            </script>
                        </div>
                        <!--上传ID card反面-->
                        <div class="idcard card_opposite">
                            <p class="idTit">身份证反面:<button type="button" class="add">添加图片</button></p>
                            <p class="id_img"></p>
                            <script>
                                h5Upload({
                                    element:'.card_opposite',
                                    name:'card_opposite',
                                    click:'.add',
                                    box:'.id_img'
                                });
                            </script>
                        </div>
                        <!--打印凭证-->
                        <div class="idcard moneyIdent money_ident">
                            <p class="idTit">打款凭证:<button type="button" class="add">添加图片</button></p>
                            <p class="id_imgs"></p>
                            <script>
                                h5Upload({
                                    max:4,
                                    element:'.money_ident',
                                    name:'money_ident',
                                    click:'.add',
                                    box:'.id_imgs'
                                });
                            </script>
                        </div>
                        <div class="idcard">
                            <div class="change">申请正式合伙人</div>
                        </div>
                        <div class="idcard">
                            <button type="submit">确认提交</button>
                        </div>
                        <script>
                            $('.change').click(function () {
                                if($('[name="now_type"]').val()==='1'){
                                    $(this).text('申请普通合伙人');
                                    $('[name="now_type"]').val(2);
                                    $('.moneyIdent').fadeIn();
                                }else {
                                    $(this).text('申请正式合伙人');
                                    $('[name="now_type"]').val(1);
                                    $('.moneyIdent').fadeOut();
                                }
                            });
                        </script>
                    </form>
                <?php else:?>
                    <form action="/user/ident/add-ident.html?id=<?=$model->id?>" method="post">
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                        <div class="oldPwd">
                            <span>认证状态:</span>
                            <input type="text" readonly placeholder="<?= \vendor\helpers\Constant::getCobberStatus()[$model->status] ?>"/>
                        </div>
                        <div class="oldPwd">
                            <span>场地地域:</span>
                            <input type="text" readonly placeholder="<?=$model->area->full_name?>"/>
                        </div>
                        <div class="oldPwd">
                            <span>详细地址:</span>
                            <input type="text" readonly placeholder="<?=$model->address?>"/>
                        </div>
                        <div class="oldPwd">
                            <span>银行类型:</span>
                            <input type="text" readonly placeholder="<?= \vendor\helpers\Constant::getBankType()[$model->bank_type] ?>"/>
                        </div>
                        <div class="oldPwd">
                            <span>银行卡号:</span>
                            <input type="text" readonly placeholder="<?=$model->bank_no?>"/>
                        </div>
                        <div class="oldPwd">
                            <span>真实姓名:</span>
                            <input type="text" readonly placeholder="<?= $model->name ?>"/>
                        </div>
                        <!--上传ID card正面-->
                        <div class="idcard">
                            <p class="idTit">身份证正面:</p>
                            <div class="id_img">
                                <img src="<?= $model->card_positive ?>" alt="身份证正面">
                            </div>
                        </div>
                        <!--上传ID card反面-->
                        <div class="idcard">
                            <p class="idTit">身份证反面:</p>
                            <div class="id_img">
                                <img src="<?= $model->card_opposite ?>" alt="身份证反面">
                            </div>
                        </div>
                        <?php if ($model->status==1):?>
                            <div class="idcard">
                                <div class="change awdawd">申请正式合伙人</div>
                            </div>
                            <div class="idcard moneyIdent money_ident">
                                <p class="idTit">打款凭证:<button type="button" class="add">添加图片</button></p>
                                <p class="id_imgs"></p>
                                <script>
                                    h5Upload({
                                        max:4,
                                        element:'.money_ident',
                                        name:'money_ident',
                                        click:'.add',
                                        box:'.id_imgs'
                                    });
                                </script>
                            </div>
                            <div class="idcard moneyIdent">
                                <div class="change sfsfsef">暂不申请</div>
                            </div>
                            <div class="idcard moneyIdent">
                                <button type="submit">确认提交</button>
                            </div>
                            <script>
                                $('.awdawd').click(function () {
                                    $(this).hide();
                                    $('.moneyIdent').fadeIn();
                                });
                                $('.sfsfsef').click(function () {
                                    $('.awdawd').fadeIn();
                                    $('.moneyIdent').hide();
                                });
                            </script>
                        <?php endif;?>
                        <?php if (in_array($model->status,[3,4,5])):?>
                            <!--打印凭证-->
                            <div class="idcard">
                                <p class="idTit">打印凭证:</p>
                                <div class="id_imgs">
                                    <?php foreach (explode(',',$model->money_ident) as $k=>$v):?>
                                        <img src="<?=$v?>" alt="打印凭证<?=$k+1?>">
                                    <?php endforeach;?>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php if (in_array($model->status,[2,5])):?>
                            <div class="idcard">
                                <p class="idTit">驳回说明:</p>
                                <div class="id_imgs">
                                    <?= $model->remark ?>
                                </div>
                            </div>
                            <div class="idcard">
                                <a href="/user/ident/del-ident.html">撤销认证</a>
                            </div>
                        <?php endif;?>
                    </form>
                <?php endif;?>
			</div>
		</div>
		<!--certified_Partners end-->
	</body>
</html>
