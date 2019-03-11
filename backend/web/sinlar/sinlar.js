document.write("<style>" +
    ".data-img{cursor:pointer} " +
    ".pic_looper{width:100%; height:100%; position: fixed; left: 0; top:0; background: rgba(0,0,0,0.6); z-index: 999; display: none;} " +
    ".pic_show{display: table-cell;vertical-align: middle;text-align: center}" +
    ".pic_show img{max-width:800px;height: 420px}" +
    ".pic_close{cursor: pointer;display: inline-block;width: 40px;height: 40px;line-height: 40px;font-size: 24px;color: silver}" +
    "</style><div class='pic_looper'><span class='pic_show'><img src=''/><br><span class='pic_close'><i class='fa fa-times' aria-hidden='true'></i></span></span></div>");
$(function () {
    $('.data-img').click(function () {
        $('.pic_show img').attr('src', $(this).attr('src'));
        $('.pic_looper').css('display', 'table');
    });
    $('.pic_close').click(function () {
        $('.pic_looper').css('display', 'none');
    });
});

function picWall(config) {
    var times = Math.ceil(config.image.split(',').length / 4);
    $(config.element).addClass('row').css({
        'border': '1px dashed #111',
        'height': (config.height * times || 16 * times) + 'rem',
        'padding-bottom': '15px',
        'margin': '0'
    });
    var images = '';
    config.image.split(',').forEach(function (v, k) {
        if (v) {
            images += '<img class="col-sm-3 data-img" src="' + v + '" style="height: ' + Math.floor(100 / times) + '%;padding: 15px 15px 0 15px">';
        }
    });
    $(config.element).append(images);
}
