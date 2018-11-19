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
    <div class="contact_form cost">
        <p class="adawdwadawd">收益预测</p>
        <table class="table table-bordered costList"></table>
    </div>
</div>
<div class="pop budgetPop">
    <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h1>填写手机号立即获取预测信息</h1>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-xs-12">
            <input type="tel" class="form-control tel" placeholder="请填写手机号">
        </div>
        <div class="col-sm-offset-2 col-sm-5 col-xs-7">
            <input type="text" class="form-control code" placeholder="请填写验证码">
        </div>
        <div class="col-sm-3 col-xs-5">
            <button type="button" class="smsCode">发送</button>
        </div>
    </div>
    <button type="button" class="myButton">立即获取</button>
</div>
<script>
    $(document).ready(function () {
        var piles = JSON.parse('<?=\vendor\en\EnProductBase::getPiles()?>');
        var powerHtml = '';
        $.each(piles, function (k, v) {
            powerHtml += '<option value="' + k + '">' + v.name + '</option>';
        });
        var params = [];
        addRule();
        addBudget();
        sms({tel: '.tel'});

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
            params = [];
            $('.about-box').find('.rule').each(function (k, v) {
                var pile = $(this).find('.power').val();
                var num = $(this).find('.num').val();
                if (pile !== '0' && num !== '0') {
                    params[k] = {id: pile, num: num};
                }
            });
            if (params.length) {
                $('.budgetPop').fadeIn();
            } else {
                layer.msg('请填写配置单');
            }
        });

        $('.pop').find('.close').click(function () {
            $(this).parent('.pop').fadeOut();
        });

        $('.myButton').click(function () {
            $.getJSON('/budget/budget/budget', {
                data: JSON.stringify(params),
                tel: $('.tel').val(),
                code: $('.code').val()
            }, function (re) {
                if (re.type) {
                    $('.budgetPop').fadeOut();
                    addBudget(re.data);
                } else {
                    layer.msg(re.msg);
                }
            });
        });

        function addBudget(data) {
            var str = '';
            if (data) {
                str += '<tr>\n' +
                    '                    <td colspan="2">投资额:</td>\n' +
                    '                    <td colspan="2">' + data.totalPrice + '</td>\n' +
                    '                    <td colspan="2">投建功率</td>\n' +
                    '                    <td colspan="2">' + data.totalPower + 'kw</td>\n' +
                    '                    <td colspan="2">变压器:</td>\n' +
                    '                    <td colspan="5">' + data.transformer.name + '</td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="2">三费:</td>\n' +
                    '                    <td colspan="2">' + (data.config.roof * 100) + '%</td>\n' +
                    '                    <td colspan="2">场地费:</td>\n' +
                    '                    <td colspan="2">' + (data.config.field * 100) + '%</td>\n' +
                    '                    <td colspan="2">保险费:</td>\n' +
                    '                    <td colspan="5">' + data.config.safe + ' 元/桩*年</td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td rowspan="2">电桩型号*数量</td>\n' +
                    '                    <td rowspan="2">总功率/利用率/电损率</td>\n' +
                    '                    <td rowspan="2">端口数</td>\n' +
                    '                    <td rowspan="2">类别</td>\n' +
                    '                    <td rowspan="2">项目</td>\n' +
                    '                    <td rowspan="2">合计</td>\n' +
                    '                    <td>建设期(年)</td>\n' +
                    '                    <td colspan="8">经营期(年)</td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td>0</td>\n' +
                    '                    <td>1</td>\n' +
                    '                    <td>2</td>\n' +
                    '                    <td>3</td>\n' +
                    '                    <td>4</td>\n' +
                    '                    <td>5</td>\n' +
                    '                    <td>6</td>\n' +
                    '                    <td>7</td>\n' +
                    '                    <td>8</td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="15"></td>\n' +
                    '                </tr>';
                $.each(data.piles, function (k, v) {
                    str += '<tr>\n' +
                        '                    <td rowspan="6">' + v.name + ' * ' + v.count + '</td>\n' +
                        '                    <td rowspan="6">' + v.power + 'kw / ' + v.use + ' / ' + v.loss + '</td>\n' +
                        '                    <td rowspan="6">' + v.num + '</td>\n' +
                        '                    <td>项目投资</td>\n' +
                        '                    <td>设备购置</td>\n' +
                        '                    <td>' + v.price + '</td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                    <td></td>\n' +
                        '                </tr>\n' +
                        '                <tr>\n' +
                        '                    <td>经营资金流入</td>\n' +
                        '                    <td>充电服务费收益</td>\n' +
                        '                    <td>' + toFloat(v.server) + '</td>\n' +
                        '                    <td></td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.server / 8) + '</td>\n' +
                        '                </tr>\n' +
                        '                <tr>\n' +
                        '                    <td rowspan="4">经营资金流出</td>\n' +
                        '                    <td>电损</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney) + '</td>\n' +
                        '                    <td></td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.lossMoney / 8) + '</td>\n' +
                        '                </tr>\n' +
                        '                <tr>\n' +
                        '                    <td>场地分成</td>\n' +
                        '                    <td>' + toFloat(v.field) + '</td>\n' +
                        '                    <td></td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.field / 8) + '</td>\n' +
                        '                </tr>\n' +
                        '                <tr>\n' +
                        '                    <td>保险费</td>\n' +
                        '                    <td>' + toFloat(v.safe) + '</td>\n' +
                        '                    <td></td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.safe / 8) + '</td>\n' +
                        '                </tr>\n' +
                        '                <tr>\n' +
                        '                    <td>三费(平台 代运营 运维)</td>\n' +
                        '                    <td>' + toFloat(v.tMoney) + '</td>\n' +
                        '                    <td></td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                    <td>' + toFloat(v.tMoney / 8) + '</td>\n' +
                        '                </tr>';
                    str += '<tr><td colspan="15"></td></tr>';
                });
                str += '<tr>\n' +
                    '                    <td colspan="5">变压器</td>\n' +
                    '                    <td>' + toFloat(data.transformer.price) + '</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="5">政府补贴</td>\n' +
                    '                    <td>' + toFloat(data.tMoney) + '</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="5">资金流净值</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney) + '</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.haveMoney / 8) + '</td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="5">净利润</td>\n' +
                    '                    <td>' + toFloat(data.endMoney) + '</td>\n' +
                    '                    <td> + ' + toFloat(data.tMoney) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                    <td>' + toFloat(data.endMoney / 8) + '</td>\n' +
                    '                </tr>';
            } else {
                str += '<tr>\n' +
                    '                    <td colspan="2">投资额:</td>\n' +
                    '                    <td colspan="2"></td>\n' +
                    '                    <td colspan="2">投建功率</td>\n' +
                    '                    <td colspan="2"></td>\n' +
                    '                    <td colspan="2">变压器:</td>\n' +
                    '                    <td colspan="5"></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="2">三费:</td>\n' +
                    '                    <td colspan="2"></td>\n' +
                    '                    <td colspan="2">场地费:</td>\n' +
                    '                    <td colspan="2"></td>\n' +
                    '                    <td colspan="2">保险费:</td>\n' +
                    '                    <td colspan="5"></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td rowspan="2">电桩型号*数量</td>\n' +
                    '                    <td rowspan="2">总功率/利用率/电损率</td>\n' +
                    '                    <td rowspan="2">端口数</td>\n' +
                    '                    <td rowspan="2">类别</td>\n' +
                    '                    <td rowspan="2">项目</td>\n' +
                    '                    <td rowspan="2">合计</td>\n' +
                    '                    <td>建设期(年)</td>\n' +
                    '                    <td colspan="8">经营期(年)</td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td>0</td>\n' +
                    '                    <td>1</td>\n' +
                    '                    <td>2</td>\n' +
                    '                    <td>3</td>\n' +
                    '                    <td>4</td>\n' +
                    '                    <td>5</td>\n' +
                    '                    <td>6</td>\n' +
                    '                    <td>7</td>\n' +
                    '                    <td>8</td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="15"></td>\n' +
                    '                </tr>';
                str += '<tr>\n' +
                    '                    <td rowspan="6"></td>\n' +
                    '                    <td rowspan="6"></td>\n' +
                    '                    <td rowspan="6"></td>\n' +
                    '                    <td>项目投资额</td>\n' +
                    '                    <td>设备购置</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td>经营资金流入</td>\n' +
                    '                    <td>充电服务费收益</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td rowspan="4">经营资金流出</td>\n' +
                    '                    <td>电损</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td>场地分成</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td>保险费</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td>三费(平台 代运营 运维)</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>';
                str += '<tr>\n' +
                    '                    <td colspan="15"></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="5">政府补贴</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="5">资金流净值</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>\n' +
                    '                <tr>\n' +
                    '                    <td colspan="5">净利润</td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                    <td></td>\n' +
                    '                </tr>';
            }
            $('.costList').html(str);
        }

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

        function toFloat(n) {
            if (n != parseInt(n)) {
                return n.toFixed(2);
            }
            return n;
        }
    });
</script>
