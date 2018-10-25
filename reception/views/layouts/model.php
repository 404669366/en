<?php
\app\assets\ModelAsset::register($this);
\app\assets\ModelAsset::offDeBug();
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="zh">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta http-equiv="refresh" content="180">-->
<meta name="robots" content="index,follow">
<title>
    新能源_充电桩_充电桩_充电桩场地_充电桩投资_信息咨询平台_四川亿能科技有限公司
</title>
<meta name="keywords" content="新能源，充电桩，充电站，充电桩场地，充电桩投资，信息咨询平台，四川亿能科技有限公司">
<meta name="description" content="新能源 充电桩场地 充电桩投资 信息咨询平台 四川亿能科技有限公司">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" href="/resource/images/apple-touch-icon.png">
<?php $this->head(); ?>
<script src="/resource/js/modernizer.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="realestate_version">

<?php $this->beginBody(); ?>
<?php $this->endBody(); ?>
<?php \vendor\helpers\Msg::run() ?>

<div id="preloader">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<header class="header header_style_01">
    <nav class="megamenu navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/menu/menu/index"><img src="/resource/images/logos/logo.png" alt="image" style="width: 8.2rem"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?= \vendor\en\EnNavBase::getNav()['topStr']?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?= $content ?>

<div id="testimonials" class="section lb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 col-md-offset-2">
                <?= \vendor\en\EnContentBase::getContent("8aw3Qa9b")?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Wonderful Support! <i class="fa fa-quote-right"></i>
                            </h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly
                                skilled, and experienced & professional team.</p>

                        </div>
                        <div class="testi-meta">
                            <img src="/resource/uploads/testi_01.png" alt="" class="img-responsive alignleft">
                            <h4>James Fernando
                                <small>- Manager of Racer</small>
                            </h4>
                        </div>
                    </div>

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Awesome Services! <i class="fa fa-quote-right"></i>
                            </h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and
                                praising pain was born and I will give you completed.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="/resource/uploads/testi_02.png" alt="" class="img-responsive alignleft">
                            <h4>Jacques Philips
                                <small>- Designer</small>
                            </h4>
                        </div>
                    </div>

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Great & Talented Team! <i
                                        class="fa fa-quote-right"></i></h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids
                                pleasure itself, because it is very pursue pleasure. </p>
                        </div>
                        <div class="testi-meta">
                            <img src="/resource/uploads/testi_03.png" alt="" class="img-responsive alignleft">
                            <h4>Venanda Mercy
                                <small>- Newyork City</small>
                            </h4>
                        </div>
                    </div>

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Wonderful Support! <i class="fa fa-quote-right"></i>
                            </h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly
                                skilled, and experienced & professional team.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="/resource/uploads/testi_01.png" alt="" class="img-responsive alignleft">
                            <h4>James Fernando
                                <small>- Manager of Racer</small>
                            </h4>
                        </div>
                    </div>

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Awesome Services! <i class="fa fa-quote-right"></i>
                            </h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and
                                praising pain was born and I will give you completed.</p>
                        </div>
                        <div class="testi-meta">
                            <img src="/resource/uploads/testi_02.png" alt="" class="img-responsive alignleft">
                            <h4>Jacques Philips
                                <small>- Designer</small>
                            </h4>
                        </div>
                    </div>

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> Great & Talented Team! <i
                                        class="fa fa-quote-right"></i></h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids
                                pleasure itself, because it is very pursue pleasure. </p>
                        </div>
                        <div class="testi-meta">
                            <img src="/resource/uploads/testi_03.png" alt="" class="img-responsive alignleft">
                            <h4>Venanda Mercy
                                <small>- Newyork City</small>
                            </h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <img src="/resource/images/logos/logo-realestate.png" alt="" style="width:8.2rem;">
                    </div>
                    <?= \vendor\en\EnContentBase::getContent("dzmQzbjp")?>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>导航</h3>
                    </div>

                    <ul class="twitter-widget footer-links">
                        <?= \vendor\en\EnNavBase::getNav()['botStr']?>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Contact Details</h3>
                    </div>

                    <ul class="footer-links">
                        <li><a href="mailto:#">info@yoursite.com</a></li>
                        <li><a href="#">www.yoursite.com</a></li>
                        <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                        <li>+61 3 8376 6284</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>友情链接</h3>
                    </div>
                    <ul class="footer-links">
                        <?=\vendor\en\EnFriendBase::getFriend()?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed" style="display: block;text-align: center">
            <div class="footer-left" style="float: none;margin: 0 auto">
                <p class="footer-company-name">All Rights Reserved. &copy; 2018 四川亿能科技有限公司</p>
            </div>
        </div>
    </div>
</div>

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
<script src="/resource/js/all.js"></script>
<script src="/resource/js/custom.js"></script>
<script src="/resource/js/portfolio.js"></script>
<script src="/resource/js/hoverdir.js"></script>
<script src="/resource/js/change.js"></script>
</body>
</html>
<?php $this->endPage() ?>

