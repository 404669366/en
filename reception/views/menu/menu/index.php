<ul class='slideshow'>
    <?= \vendor\en\EnBroadcastBase::getBro() ?>
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
                                <input type="text" name="name" class="form-control name" placeholder="姓名">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="tel" class="form-control tel" placeholder="电话">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="sr-only"></label>
                                <select name="business" class="selectpicker form-control type"
                                        data-style="btn-white">
                                    <option value="0">业务</option>
                                    <?php foreach (\vendor\helpers\Constant::amendType() as $k => $v): ?>
                                        <option value="<?= $k ?>"><?= $v ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="button" value="SEND"
                                        class="btn btn-light btn-radius btn-brd grd1 btn-block up">提交
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="big-tagline clearfix">
                    <?= \vendor\en\EnContentBase::getContent('eQzruthc') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-box">
    <div class="container">
        <div class="row">
            <div class="top-feature owl-carousel owl-theme">
                <?= \vendor\en\EnServeBase::getServe() ?>
            </div>
        </div>

        <hr class="hr1">

        <div class="row">
            <div class="col-md-6">
                <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <img src="/resource/uploads/about_bg.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-md-6">
                <div class="message-box right-ab">
                    <?= \vendor\en\EnContentBase::getContent("r9yrsiQg") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pop">
    <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h1>12e12e21e12e</h1>
    <p>
        anoiudnawiodnawoindoawmdlmcklsniucbaiubcajiddddddddddwbnnnnnbnuiwdnoawidnoainckoamnxklandiojwabndiuawbfcjksnmv,dncm,andwabdiuawbdiuawbiuda</p>
    <a class="myButton">立即前往</a>
</div>
<style>
    .pop {
        display: none;
        width: 64%;
        height: 44%;
        background: url("/resource/images/pop.jpg") no-repeat center;
        background-size: 100% 100%;
        opacity: 1;
        position: fixed;
        z-index: 9999999;
        padding: 2rem;
        border-radius: 10px;
    }

    .pop .close {
        width: 2.2rem;
        height: 2.2rem;
        /*background: url("/resource/images/close.png") no-repeat center;
        background-size: 100% 100%;*/
        color: white;
        text-align: center;
        line-height: 2.2rem;
        font-size: 2.4rem;
        position: absolute;
        top: 0.6rem;
        right: 0.6rem;
        opacity: 0.9;
        cursor: pointer;
        z-index: 99999999999;
    }

    .pop .close:hover {
        opacity: 1.8;
    }

    .pop h1 {
        line-height: 4rem !important;
        font-size: 26px;
        text-align: center;
        color: #444;
    }

    .pop p {
        height: 70%;
        color: #444;
        font-size: 20px;
        text-indent: 40px;
        word-wrap: break-word;
        overflow-y: auto;
    }

    .pop p::-webkit-scrollbar {
        display: none;
    }

    .pop .myButton {
        text-align: center;
        display: block;
        margin: 0 auto;
        border: 0;
        border-radius: 4px;
        line-height: 3rem;
        width: 10rem;
        color: #f5f5f5;
        background: #A8CF45;
        cursor: pointer;
        box-shadow: 2px 2px 10px #888888;
    }

    .pop .myButton:hover {
        color: #f3f3f3 !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('.pop')
            .css('left', ($('body').width() - $('.pop').width()) / 2 + 'px')
            .css('top', ($('body').height() - $('.pop').height()) / 2 + 'px')
            .fadeIn()
            .find('.close').click(function () {
            $(this).parent('.pop').fadeOut();
        });
    });
    $('.up').click(function () {
        var data = {
            name: $('.name').val(),
            tel: $('.tel').val(),
            type: $('.type').val(),
        };
        if (checkData(data)) {
            $.getJSON('/amend/amend/save', data, function (re) {
                if (re.type) {
                    layer.msg('提交成功，我们将尽快与您联系');
                } else {
                    layer.msg(re.msg);
                }
            })
        }

        function checkData(data) {
            if (!data.name) {
                layer.msg('请填写姓名');
                return false;
            }
            if (!data.tel) {
                layer.msg('请填写手机号');
                return false;
            }
            if (!(/^1(3|4|5|7|8)\d{9}$/.test(data.tel))) {
                layer.msg('手机号有误');
                return false;
            }
            if (data.type === '0') {
                layer.msg('请填写业务类型');
                return false;
            }
            return true;
        }

    });

</script>