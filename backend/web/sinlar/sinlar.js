document.write("<style>.data-img{cursor:pointer} .pic_looper{width:100%; height:100%; position: fixed; left: 0; top:0; opacity: 0.5; background: #000; display: none; } .pic_show{width:100%; max-width: 1020px; height:520px; position:absolute; left:0; top:0; right:0; bottom:0; margin:auto; text-align: center; display: none; } .pic_box{width:90%;height:450px;margin:40px auto;text-align: center;list-style: none;padding: 0;border: 0;text-decoration: none;} .pic_box img{height:100%;} .pic_close_box{width: 100%;margin-top:4px;height: 40px;list-style: none;text-align: center;line-height: 40px;font-size: 36px;color: white;padding: 0;border: 0;text-decoration: none;background: rgba(0,0,0,0)} .pic_close{cursor: pointer} </style><div class='pic_looper'></div> <div class='pic_show'><div class='pic_box'><img src=''/><div class='pic_close_box'><span class='pic_close'><i class='fa fa-times' aria-hidden='true'></i></span></div></div></div>");
$(function () {
    $('.data-img').click(function () {
        var img = this.getAttribute('src');
        $('.pic_show img').attr('src', img);
        $('.pic_looper').fadeIn(500), $('.pic_show').fadeIn(500);
    });
    $('.pic_close').click(function () {
        $('.pic_looper').fadeOut(300);
        $('.pic_show').fadeOut(300);
    });

    function picWall(config) {
        $(config.element).addClass('row').css('border', '1px dashed #111');
        var images = '';
        config.image.split(',').forEach(function (v, k) {
            images += '<img class="clo-sm-3" src="' + v + '">';
        });
        $(config.element).append(images);
    }
});