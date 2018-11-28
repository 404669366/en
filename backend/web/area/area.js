function area(config) {
    $(config.element).addClass('row')
        .append('<input type="hidden" name="' + (config.name || 'area') + '">')
        .append('<select class="col-sm-2 province"><option value="">-- 省份 --</option></select>')
        .append('<select class="col-sm-2 city"><option value="">-- 城市 --</option></select>')
        .append('<select class="col-sm-2 county"><option value="">-- 区县 --</option></select>');
    if (config.default) {
        setVal(config.default);
        $.getJSON('/basis/area/def', {area_id: config.default}, function (re) {
            if (re.type) {
                $(config.element).find('.province').html(re.data.province);
                $(config.element).find('.city').html(re.data.city);
                $(config.element).find('.county').html(re.data.county);
            }
        })
    } else {
        areaRun();
    }
    $(config.element).on('change', '.province', function () {
        areaRun($(this).val(), null, 'city');
        $(config.element).find('.county').html('<option value="">-- 区县 --</option></select>');
        setVal(null);
    });

    $(config.element).on('change', '.city', function () {
        areaRun($(this).val(), null, 'county');
    });

    $(config.element).on('change', '.county', function () {
        setVal($(this).val());
    });

    function areaRun(pid, def, model) {
        $.getJSON('/basis/area/data', (pid ? {pid: pid} : {}), function (re) {
            if (re.type) {
                var map = {
                    'province': '省份',
                    'city': '城市',
                    'county': '区县'
                };
                var str = '<option value="">-- ' + map[(model || 'province')] + ' --</option>';
                $.each(re.data, function (k, v) {
                    if (def && def == v.area_id) {
                        str += '<option value="' + v.area_id + '" selected>' + v.area_name + '</option>';
                    } else {
                        str += '<option value="' + v.area_id + '">' + v.area_name + '</option>';
                    }
                });
                $(config.element).find(model ? '.' + model : '.province').html(str);
            }
        });
    }

    function setVal(val) {
        $(config.element).find('[name="' + (config.name || 'area') + '"]').val(val);
    }
}