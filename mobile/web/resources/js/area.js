function area(config) {
    var def = {
        province: '<option value="">-- 省份 --</option>',
        city: '<option value="">-- 城市 --</option>',
        county: '<option value="">-- 区县 --</option>'
    };

    $(config.element).append('<input type="hidden" name="' + (config.name || 'area_id') + '"/>');

    if (config.def) {
        setVal(config.def);
        $.getJSON('/basis/area/def.html', {area_id: config.def}, function (re) {
            if (re.type) {
                $(config.element).find('.province').html(re.data.province);
                $(config.element).find('.city').html(re.data.city);
                $(config.element).find('.county').html(re.data.county);
            }
        });
    } else {
        getData();
    }

    $(config.element).find('.province').html(def['province']).change(function () {
        getData($(this).val(), 'city');
        $(config.element).find('.county').html(def['county']);
        setVal(null);

    });

    $(config.element).find('.city').html(def['city']).change(function () {
        getData($(this).val(), 'county');
        setVal(null);
    });

    $(config.element).find('.county').html(def['county']).change(function () {
        setVal($(this).val());
    });


    function getData(pid, model) {
        model = (model || 'province');
        var str = def[model];
        $.getJSON('/basis/area/data.html', {pid: (pid || 0)}, function (re) {
            if (re.type) {
                $.each(re.data, function (k, v) {
                    str += '<option value="' + v.area_id + '">' + v.area_name + '</option>';
                });
                $(config.element).find('.' + model).html(str);
            }
        });
    }

    function setVal(val) {
        $(config.element).find('[name="' + (config.name || 'area_id') + '"]').val(val);
    }
}

$(function () {
    var area_name = $('.area').attr('name') || 'area_id';
    var def = $('.area').attr('def') || '';
    area({
        element: '.area',
        name: area_name,
        def: def
    });
});