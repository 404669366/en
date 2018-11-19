<ul class='slideshow'>
    <?= \vendor\en\EnBroadcastBase::getBro() ?>
</ul>

<div class="parallax first-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="big-tagline clearfix">
                    <?= \vendor\en\EnContentBase::getContent('eQzruthc') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-box">
    <div class="container">
        <?=\vendor\en\EnServeBase::getServerContent()?>
    </div>
</div>
<div class="pop">
    <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <a class="myButton" href="/menu/menu/budget">立即前往</a>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $('.pop').find('.close').click(function () {
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