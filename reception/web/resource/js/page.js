function page(config) {
    $(config.element).before('<link type="text/css" href="/resource/css/jquery.page.css" rel="stylesheet"/>');
    $(config.element).before('<script src="/resource/js/jquery.page.js"></script>');
    $(config.element).after('<div class="tcdPageCode"></div>');
    var model = $('.tcdPageCode');
    var length = config.length || 10;
    getData(1, function (pageCount) {
        model.createPage({
            pageCount: pageCount,
            current: 1,
            backFn: function (page) {
                getData(page);
            }
        });
    });

    function getData(page, callback) {
        $.getJSON(config.url, {start: (page - 1) * length, length: length, needTotal: callback ? 1 : 0}, function (re) {
            if (callback) {
                callback(Math.ceil(re.total / length));
            }
            $(config.element).text('');
            $.each(re.data, function (k, v) {
                if (config.callBack) {
                    config.callBack(v);
                }
            });
        });
    }
}
