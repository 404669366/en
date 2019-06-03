<?php $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css', ['depends' => 'app\assets\ModelAsset']); ?>
<?php $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js', ['depends' => 'app\assets\ModelAsset']); ?>
<style>
    .sgasedfaw {
        height: 14rem;
        box-sizing: border-box;
        padding-top: 0.26rem;
    }

    .sfesaffw {
        display: table;
    }

    .sfesaffw > span {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }

    .cadwad {
        margin-top: 1rem;
    }
</style>
<div class="ibox-content">
    <div class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩收费配置名称</label>
            <div class="col-sm-2">
                <input type="text" class="form-control name" value="<?= $model->name ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">说明</label>
            <div class="col-sm-2">
                <textarea class="form-control intro" rows="6"><?= $model->intro ?></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">规则</label>
            <div class="col-sm-10">
                <?php foreach ($info as $k => $v): ?>
                    <div class="col-sm-4 sgasedfaw">
                        <div class="rule" id="rule<?= $k + 1 ?>" minTime="<?= $v['start'] / 60 ?>"></div>
                        <div class="form-horizontal cadwad">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">电&emsp;费:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control electrovalence"
                                           value="<?= $v['electrovalence'] ?>" <?= ($k + 1) == count($info) ? "" : "readonly" ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">服务费:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control service"
                                           value="<?= $v['service'] ?>" <?= ($k + 1) == count($info) ? "" : "readonly" ?>>
                                </div>
                            </div>
                        </div>
                        <script>
                            function PrefixInteger(num, length) {
                                return (Array(length).join('0') + num).slice(-length);
                            }

                            var lastModel = $("#rule<?=$k + 1?>").ionRangeSlider({
                                skin: "round",
                                grid: true,
                                min: <?=$v['start'] / 60?>,
                                max: 1440,
                                from:<?=$v['end'] / 60?>,
                                from_fixed:<?php if($model->id==1){echo 'true';}else{echo ($k + 1) == count($info) ? "false" : "true";} ?>,
                                prettify: function (n) {
                                    var hours = PrefixInteger(parseInt(n / 60), 2);
                                    var min = PrefixInteger(n % 60, 2);
                                    return hours + ':' + min;
                                }
                            });
                        </script>
                    </div>
                <?php endforeach;?>
                <div class="col-sm-4 sgasedfaw sfesaffw">
                    <?php if ($model->id != 1):?>
                    <span>
                        <button class="fgsfawedfa btn btn-primary" type="button" style="display: none">添加规则</button>
                        <button class="lowedfa btn btn-danger" type="button">删除规则</button>
                    </span>
                    <?php endif;?>
                    <script>
                        function isNumber(val) {
                            var regPos = /^\d+(\.\d+)?$/; //非负浮点数
                            var regNeg = /^(-(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*)))$/; //负浮点数
                            if (regPos.test(val) || regNeg.test(val)) {
                                return true;
                            } else {
                                return false;
                            }
                        }

                        var alkwnda = $('.cadwad').html();
                        $('.fgsfawedfa').click(function () {
                            var num = $('.rule').length;
                            var last = $('#rule' + num).prop('value');
                            var lastMin = $('#rule' + num).attr('minTime');
                            if (last > 0 && last > lastMin) {
                                var electrovalence = $('#rule' + num).parent('.sgasedfaw').find('.electrovalence');
                                var service = $('#rule' + num).parent('.sgasedfaw').find('.service');
                                if (!electrovalence.val() || !isNumber(electrovalence.val())) {
                                    layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">请填写正确的电费</span>');
                                    return;
                                }
                                if (!service.val() || !isNumber(service.val())) {
                                    layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">请填写正确的服务费</span>');
                                    return;
                                }
                                electrovalence.prop('readonly', true);
                                service.prop('readonly', true);
                                $('#rule' + num).data('ionRangeSlider').update({from_fixed: true});
                                var name = 'rule' + (num + 1);
                                $(this).parents('.sgasedfaw').before('<div class="col-sm-4 sgasedfaw"><div class="rule" id="' + name + '" minTime="' + last + '"></div>');
                                $('#' + name).after('<div class="form-horizontal cadwad">' + alkwnda + '</div>');
                                $('#' + name).parent('.sgasedfaw').find('.electrovalence').prop('readonly',false).val('');
                                $('#' + name).parent('.sgasedfaw').find('.service').prop('readonly',false).val('');
                                lastModel = $("#" + name).ionRangeSlider({
                                    skin: "round",
                                    grid: true,
                                    min: last,
                                    max: 1440,
                                    prettify: function (n) {
                                        var hours = PrefixInteger(parseInt(n / 60), 2);
                                        var min = PrefixInteger(n % 60, 2);
                                        return hours + ':' + min;
                                    }
                                });
                            } else {
                                layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">请选择范围</span>');
                            }
                        });
                        $('.lowedfa').click(function () {
                            var num = $('.rule').length;
                            if (num > 1) {
                                $('#rule' + num).parents('.sgasedfaw').remove();
                                $('#rule' + (num - 1)).data('ionRangeSlider').update({from_fixed: false});
                                var electrovalence = $('#rule' + (num - 1)).parent('.sgasedfaw').find('.electrovalence');
                                var service = $('#rule' + (num - 1)).parent('.sgasedfaw').find('.service');
                                electrovalence.prop('readonly', false);
                                service.prop('readonly', false);
                                $('.fgsfawedfa').show();
                            } else {
                                layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">必须保留一条规则</span>')
                            }
                        });

                        $('.form-group').on('change', '.rule', function () {
                            $('.fgsfawedfa').show();
                            $('.rule').each(function (k, v) {
                                if ($(v).prop('value') >= 1440) {
                                    $('.fgsfawedfa').hide();
                                }
                            });
                        })

                    </script>
                </div>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary gki67tyh5" type="button">保存内容</button>
                <script>
                    function postCall(url, params, target) {
                        var form = document.createElement("form");
                        form.style.display = "none";
                        form.action = url || '';
                        form.method = "post";
                        form.target = target || '_self';
                        var opt;
                        for (var x in params) {
                            opt = document.createElement("input");
                            opt.name = x;
                            opt.value = params[x];
                            form.appendChild(opt);
                        }
                        document.body.appendChild(form);
                        form.submit();
                        document.body.removeChild(form);
                    }

                    $('.gki67tyh5').click(function () {
                        var data = {
                            _csrf: '<?= Yii::$app->request->csrfToken?>',
                            name: $('.name').val(),
                            intro: $('.intro').val(),
                            rules: []
                        };
                        $('.rule').each(function (k, v) {
                            var one = {
                                start: $(v).attr('minTime') * 60,
                                end: $(v).prop('value') * 60,
                                electrovalence: $(v).parent('.sgasedfaw').find('.electrovalence').val(),
                                service: $(v).parent('.sgasedfaw').find('.service').val(),
                                section_type_id:<?=$model->id?>,

                            };
                            if (!one.electrovalence || !isNumber(one.electrovalence)) {
                                data.rules = [];
                                return;
                            }
                            if (!one.service || !isNumber(one.service)) {
                                data.rules = [];
                                return;
                            }
                            data.rules[k] = one;
                        });
                        if (!data.rules.length) {
                            layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">电费或服务费填写有误</span>');
                            return;
                        }
                        if (data.rules[$('.rule').length - 1].end < 86400) {
                            layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">规则必须覆盖0-24小时</span>');
                            return;
                        }
                        data.rules = JSON.stringify(data.rules);
                        postCall('/electricize/section-type/edit?id=<?=$model->id?>', data);
                    });
                </script>
                <button class="btn btn-white back">返回</button>
            </div>
        </div>
    </div>
</div>