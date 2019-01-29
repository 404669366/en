function submit(config) {
    $(config.click || '.up').click(function () {
        var that = $(this);
        var data = {};
        $.each(config.params || [], function (k, v) {
            var now = that.parents('.submit').find('.' + v);
            if (now.prop('type') === 'checkbox') {
                data[v] = {};
                $.each(now, function (key, val) {
                    if ($(val).prop('checked')) {
                        data[v][key] = $(val).val();
                    }
                });
            } else if (now.prop('type') === 'radio') {
                data[v] = '';
                $.each(now, function (key, val) {
                    if ($(val).prop('checked')) {
                        data[v] = $(val).val();
                    }
                });
            } else {
                data[v] = now.val();
            }
        });
        if (config.url) {
            $.getJSON(config.url, data, function (re) {
                layer.msg(re.msg);
                if (re.type && config.callBack) {
                    config.callBack(re.data);
                }
            })
        } else {
            console.log(data);
        }
    });
}