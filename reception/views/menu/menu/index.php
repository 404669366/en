<ul class='slideshow'>
    <?=\vendor\en\EnBroadcastBase::getBro()?>
</ul>

<div class="parallax first-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow slideInLeft ">
                <div class="contact_form">
                    <h3 style="color: white"><i class="fa fa-envelope-o grd1 global-radius"></i> 联系方式</h3>
                    <form id="contactform1" class="row" name="contactform" method="post">
                        <fieldset class="row-fluid">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name"  class="form-control name" placeholder="姓名" >
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="tel"  class="form-control tel" placeholder="电话" >
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="sr-only"></label>
                                <select name="business"  class="selectpicker form-control type"
                                        data-style="btn-white">
                                    <option value="0">业务</option>
                                    <?php foreach (\vendor\helpers\Constant::amendType() as $k=>$v):?>
                                        <option value="<?=$k?>"><?=$v?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="button" value="SEND"  class="btn btn-light btn-radius btn-brd grd1 btn-block up">提交</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="big-tagline clearfix">
                    <?=\vendor\en\EnContentBase::getContent('eQzruthc')?>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="about-box">
    <div class="container">
        <div class="row">
            <div class="top-feature owl-carousel owl-theme">
                <?=\vendor\en\EnModuleBase::getModule()?>
            </div>
        </div>

        <hr class="hr1">

        <div class="row">
            <div class="col-md-6">
                <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <img src="/resource/uploads/about_bg.jpg" alt="" class="img-responsive">
                </div><!-- end media -->
            </div>
            <div class="col-md-6">
                <div class="message-box right-ab">
                    <?= \vendor\en\EnContentBase::getContent("r9yrsiQg")?>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="agent" class="parallax section db parallax-off" style="background-image:url('/resource/uploads/parallax_02.png');">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 col-md-offset-2">
                <?= \vendor\en\EnContentBase::getContent("p8endget")?>
            </div><!-- end col -->
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-6">
                <div class="message-box">
                    <?= \vendor\en\EnContentBase::getContent("a5uofucx")?>
                </div><!-- end messagebox -->
            </div><!-- end col -->
            <div class="col-md-3">
                <div class="post-media wow fadeIn">
                    <img src="/resource/uploads/agent.jpg" alt="" class="img-responsive">
                    <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a>
                </div><!-- end media -->
            </div><!-- end col -->
            <div class="col-md-3">
                <div class="agencies_meta clearfix">
                    <span><i class="fa fa-envelope "></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                    <span><i class="fa fa-link "></i> <a href="#">www.sitename.com</a></span>
                    <span><i class="fa fa-phone-square "></i> +1 232 444 55 66</span>
                    <span><i class="fa fa-print "></i> +1 232 444 55 66</span>
                    <span><i class="fa fa-facebook-square "></i> <a href="#">facebook.com/tagline</a></span>
                    <span><i class="fa fa-twitter-square "></i> <a href="#">twitter.com/tagline</a></span>
                    <span><i class="fa fa-linkedin-square "></i> <a href="#">linkedin.com/tagline</a></span>
                </div><!-- end agencies_meta -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
</div>

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
                    layer.msg('提交成功，我们将尽快与您联系');
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