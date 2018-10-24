<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>联系我们</h2>
                <!-- Breadcrumbs -->
            </div>
        </div>
    </div>
</div>

<div id="support" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <?= \vendor\en\EnContentBase::getContent("di9lfk7l")?>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform" class="row" action="" name="contactform" method="post">
                        <fieldset class="row-fluid">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                <input type="text" name="name" id="first_name" class="form-control name" placeholder="姓名"">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                <input type="tel" name="text"  class="form-control tel" placeholder="手机号码"">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                <select name="business"  class="selectpicker form-control type"
                                        data-style="btn-white">
                                    <option value="0">业务</option>
                                    <?php foreach (\vendor\helpers\Constant::amendType() as $k=>$v):?>
                                        <option value="<?=$k?>"><?=$v?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                                <button type="button" value="SEND" class="btn btn-light btn-radius btn-brd grd1 btn-block up">
                                    提交
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
<!--<div id="map">-->
<!--</div>-->
<script type="text/javascript">
    $('.up').click(function () {
        var data = {
            name: $('.name').val(),
            tel: $('.tel').val(),
            type: $('.type').val(),
        }
        if(checkData(data)){
            $.getJSON('/amend/amend/save',data,function (re) {
                if(re.type){
                    layer.msg('提交成功，我们将尽快与您联系')
                }else{
                    layer.msg(re.msg);
                }
            })
        }
        function checkData(data) {
            if(!data.name){
                layer.msg('请填写姓名');
                return false;
            }
            if(!data.tel){
                layer.msg('请填写手机号');
                return false;
            }
            if(!(/^1(3|4|5|7|8)\d{9}$/.test(data.tel))){
                layer.msg('手机号有误');
                return false;
            }
            if(data.type === '0'){
                layer.msg('请填写业务类型');
                return false;
            }
            return true;
        }
        
    });

</script>
