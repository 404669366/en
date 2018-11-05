<div class="about-box">
    <div class="contact_form ruleList">
        <p class="adawdwadawd">配置单</p>
        <div class="row btnBox">
            <div class="col-sm-offset-4 col-sm-2 col-xs-offset-2 col-xs-4">
                <button type="button" class="addRule">添加配置</button>
            </div>
            <div class="col-sm-2 col-xs-4">
                <button type="button" class="upRule">开始预测</button>
            </div>
        </div>
    </div>
    <div class="contact_form row cost">
        <p class="adawdwadawd">成本预测</p>
        <div class="col-md-offset-1 col-md-10">
            <table class="table table-bordered costList"></table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var piles = JSON.parse('<?=\vendor\en\EnProductBase::getPiles()?>');
        var powerHtml = '';
        $.each(piles, function (k, v) {
            powerHtml += '<option value="' + k + '">' + v.name + '</option>';
        });
        addRule();
        $('.selectPicker').selectpicker('refresh');
        $('.about-box').on('change', '.power', function () {
            if ($(this).val()) {
                var numHtml = '<option value="0">枪口数</option>';
                $.each(piles[$(this).val()].para.split('-'), function (k, v) {
                    numHtml += '<option value="' + v + '">' + v + '</option>';
                });
                $(this).parents('.rule').find('.num').find('option').remove();
                $(this).parents('.rule').find('.num').append(numHtml);
                $(this).parents('.rule').find('.resultPower').text('单枪功率');
                $('.selectPicker').selectpicker('refresh');
            }
        });
        $('.about-box').on('change', '.num', function () {
            var power = $(this).parents('.rule').find('.power').val();
            if (power && $(this).val() !== '0') {
                $(this).parents('.rule').find('.resultPower').text(piles[power].power / $(this).val() + 'kw');
            }
            if ($(this).val() === '0') {
                $(this).parents('.rule').find('.resultPower').text('单枪功率');
            }
        });
        $('.about-box').on('click', '.delRule', function () {
            $(this).parents('.rule').remove();
        });
        $('.addRule').click(function () {
            addRule();
        });
        $('.upRule').click(function () {
            var data = [];
            $('.about-box').find('.rule').each(function (k, v) {
                var pile = $(this).find('.power').val();
                var num = $(this).find('.num').val();
                if (pile !== '0' && num !== '0') {
                    data[k] = {id: pile, num: num};
                }
            });
            if (data.length) {
                $.getJSON('/budget/budget/base-budget', {data: JSON.stringify(data)}, function (re) {
                    if (re.type) {
                        var str = '<tr>\n' +
                            '                    <td>电桩</td>\n' +
                            '                    <td>电桩功率(kw)</td>\n' +
                            '                    <td>枪口数量(个)</td>\n' +
                            '                    <td>枪口功率(kw)</td>\n' +
                            '                    <td>电桩价格(元)</td>\n' +
                            '                </tr>';
                        $.each(re.data.piles, function (k, v) {
                            str += '<tr>\n' +
                                '       <td>' + v.name + '</td>\n' +
                                '       <td>' + v.power + '</td>\n' +
                                '       <td>' + v.num + '</td>\n' +
                                '       <td>' + v.gunPower + '</td>\n' +
                                '       <td>' + v.price + '</td>\n' +
                                '   </tr>';
                        });
                        str += '<tr>\n' +
                            '       <td colspan="1">总功率</td>\n' +
                            '       <td colspan="4">' + re.data.totalPower + 'kw</td>\n' +
                            '   </tr>';
                        str += '<tr>\n' +
                            '       <td colspan="1">变压器</td>\n' +
                            '       <td colspan="2">' + re.data.transformer.name + '</td>\n' +
                            '       <td colspan="1">变压器价格</td>\n' +
                            '       <td colspan="1">' + re.data.transformer.price + '</td>\n' +
                            '   </tr>';
                        str += '<tr>\n' +
                            '       <td colspan="1">预计成本</td>\n' +
                            '       <td colspan="4">' + re.data.totalPrice + '元</td>\n' +
                            '   </tr>';
                        $('.costList').html(str);
                        $('.cost').fadeIn();
                    } else {
                        layer.msg('获取预测失败');
                    }
                });
            } else {
                layer.msg('请填写配置单');
            }
        });

        function addRule() {
            var num = $('.about-box').find('.rule').length + 1;
            $('.btnBox').before('<div class="row rule">\n' +
                '            <div class="col-sm-offset-2 col-sm-1 ruleNum">配置 ' + num + '</div>\n' +
                '            <div class="col-sm-2">\n' +
                '                <select class="selectPicker form-control power" data-style="btn-white">\n' +
                '                    <option value="0">电桩型号</option>\n' + powerHtml +
                '                </select>\n' +
                '            </div>\n' +
                '            <div class="col-sm-2">\n' +
                '                <select class="selectPicker form-control num" data-style="btn-white">\n' +
                '                    <option value="0">枪口数</option>\n' +
                '                </select>\n' +
                '            </div>\n' +
                '            <div class="col-sm-2">\n' +
                '                <div class="form-control resultPower">单枪功率</div>\n' +
                '            </div>\n' +
                '            <div class="col-sm-1">\n' +
                '                <div class="delRule">删除</div>\n' +
                '            </div>\n' +
                '        </div>');
            $('.selectPicker').selectpicker('refresh');
        }
    });
</script>
