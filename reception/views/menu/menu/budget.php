<style>
    .resultPower{
        text-align: center;
        line-height: 55px;
        padding: 0!important;
    }
</style>
<div class="about-box">
    <div class="contact_form">
        <div class="row">
            <fieldset class="row-fluid">
                <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <label class="sr-only"></label>
                    <select class="selectpicker form-control power" data-style="btn-white">
                        <option value="0">业务</option>
                        <?php foreach (\vendor\helpers\Constant::amendType() as $k => $v): ?>
                            <option value="<?= $k ?>"><?= $v ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <label class="sr-only"></label>
                    <select class="selectpicker form-control num" data-style="btn-white">
                        <option value="0">业务</option>
                        <?php foreach (\vendor\helpers\Constant::amendType() as $k => $v): ?>
                            <option value="<?= $k ?>"><?= $v ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-control resultPower">单枪功率</div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script>
    $('.num').on('change', function () {
        $('.resultPower').text($('.power').val() / $(this).val() + 'Kw')
    })
</script>
