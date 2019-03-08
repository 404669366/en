function area(config) {
    $(config.element).append('<input type="hidden" name="' + (config.areaName || 'area') + '">')
        .append('<input type="hidden" name="' + (config.latName || 'lat') + '">')
        .append('<input type="hidden" name="' + (config.lngName || 'lng') + '">')
        .append('<style>.form-my{height: 34px;line-height: 1.42857;background-color: rgb(255, 255, 255);background-image: none;color: inherit;display: block;font-size: 14px;border-width: 1px;border-style: solid;border-color: rgb(229, 230, 231);border-image: initial;border-radius: 1px;padding: 6px 12px;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;}</style>')
        .append('<select class="form-my col-sm-3 city"><option value="">-- 城市 --</option></select>')
        .append('<select class="form-my col-sm-3 county"><option value="">-- 区县 --</option></select>')
        .append('<select class="form-my col-sm-3 county"><option value="">-- 区县 --</option></select>');
    $(config.element).after('<div><div class="col-sm-9" id="' + (config.areaName || 'area') + 'Map" style="height: ' + (config.mapHeight ? config.mapHeight + 'rem' : '32rem') + '"></div></div>');
    if (config.area) {
        setVal(config.area);
        setCoordinate(config.lng || '', config.lat || '');
        $.getJSON('/basis/area/def', {area_id: config.area}, function (re) {
            if (re.type) {
                $(config.element).find('.province').html(re.data.province);
                $(config.element).find('.city').html(re.data.city);
                $(config.element).find('.county').html(re.data.county);
            }
        })
    } else {
        areaRun();
    }
    var lng = config.lng || 104.04124020;
    var lat = config.lat || 30.612881788;
    var map = new BMap.Map((config.areaName || 'area') + 'Map');
    map.enableScrollWheelZoom(true);
    var point = new BMap.Point(lng, lat);
    map.centerAndZoom(point, 11);
    map.addOverlay(new BMap.Marker(point));
    map.addEventListener("click", function (e) {
        map.clearOverlays();
        point = new BMap.Point(e.point.lng, e.point.lat);
        map.addOverlay(new BMap.Marker(point));
        setCoordinate(e.point.lng, e.point.lat);
    });

    $(config.element).on('change', '.province', function () {
        areaRun($(this).val(), null, 'city');
        $(config.element).find('.county').html('<option value="">-- 区县 --</option></select>');
        setVal(null);
        setCoordinate(null, null);
    });

    $(config.element).on('change', '.city', function () {
        areaRun($(this).val(), null, 'county');
    });

    $(config.element).on('change', '.county', function () {
        setVal($(this).val());
        if ($(this).val()) {
            $.getJSON('/basis/area/coordinate', {area_id: $(this).val()}, function (re) {
                if (re.type) {
                    map.clearOverlays();
                    point = new BMap.Point(re.data.lng, re.data.lat);
                    map.centerAndZoom(point, 11);
                    map.addOverlay(new BMap.Marker(point));
                    setCoordinate(re.data.lng, re.data.lat);
                }
            })
        }
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
        if (config.modify) {
            $(config.element).find('[name="' + (config.areaName || 'area') + '"]').val(val);
        }
    }

    function setCoordinate(nowLng, nowLat) {
        if (config.modify) {
            $(config.element).find('[name="' + (config.latName || 'lat') + '"]').val(nowLat);
            $(config.element).find('[name="' + (config.lngName || 'lng') + '"]').val(nowLng);
        }
    }
}