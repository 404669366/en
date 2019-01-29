function h5Upload(config) {
    if (!config.element) {
        layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">请配置根节点</span>');
        return;
    }
    if (!config.click) {
        layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">请配置点击节点</span>');
        return;
    }
    if (!config.box) {
        layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">请配置上传预览节点</span>');
        return;
    }
    config.max = config.max || 1;
    config.name = config.name || 'image';
    config.limit = config.limit || ',';
    config.uploadImgUrl = config.uploadImgUrl || '/basis/file/upload.html';
    config.removeImgUrl = config.removeImgUrl || '/basis/file/delete.html';
    $(config.box).before('<div class="jingBox" style="width: 100%;height: 2rem;background: #aaa;display: none"><div class="jingdu" style="background: #3072F3;height: 2rem;float: left"></div></div>');
    $(config.element).append('<input type="file" class="myUploadFile" accept="image/*" style="display: none"/>');
    $(config.element).append('<textarea class="myUploadResult" name="' + (config.name || 'image') + '" style="display: none"></textarea>');
    $(config.box).css('position', 'relative');
    if (config.default) {
        $(config.element).find('.myUploadResult').val(config.default);
        config.default.split(config.limit).forEach(function (src, number) {
            $(config.element).find(config.box).append('<img src="' + src + '">');
        });

    }
    $(config.element).on('click', config.click, function () {
        if (config.max > $(config.element).find(config.box).find('img').length) {
            $(config.element).find('.myUploadFile').click();
        } else {
            layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">最多上传' + config.max + '张图片</span>');
        }
    });
    $(config.element).on('change', '.myUploadFile', function () {
        var path = $(this).val();
        if (path.length == 0) {
            return false;
        } else {
            var extStart = path.lastIndexOf('.'),
                ext = path.substring(extStart, path.length).toUpperCase();
            if (ext !== '.PNG' && ext !== '.JPG' && ext !== '.JPEG') {
                layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">图片格式错误</span>');
                return false;
            }
        }
        var size = $(this)[0].files[0].size || 0;
        $(config.element).find('.jingBox').fadeIn();
        var formData = new FormData();
        formData.append('file', $(this)[0].files[0]);
        $.ajax({
            url: config.uploadImgUrl,
            type: "post",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            xhr: function () {
                myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', function (e) {
                        if (e.lengthComputable) {
                            var bili = (e.loaded / e.total * 100).toFixed(2);
                            if (bili >= 100) {
                                $(config.element).find('.jingBox').fadeOut();
                            } else {
                                $(config.element).find('.jingdu').css('width', bili + "%");
                            }
                        }
                    }, false);
                }
                return myXhr;
            },
            success: function (res) {
                layer.msg('<span style="font-size:2.8rem;height:100%;line-height:100%">' + res.msg + '</span>');
                if (res.type) {
                    addImg(res.data);
                }
            }
        });
    });
    $(config.element).find(config.box).on('click', 'img', function () {
        var position = $(this).position();
        $(config.element).find(config.box).append('<div class="myDelUploadBox" style="background: rgba(0,0,0,0.7);position: absolute;left: ' + position.left + 'px;top:' + position.top + 'px;width: ' + $(this).width() + 'px;height: ' + $(this).height() + 'px;margin: ' + $(this).css('margin') + '"></div>');
        $(config.element).find('.myDelUploadBox').append('<div class="myDelUploadBoxDel" nowSrc="' + $(this).attr('src') + '" style="width: 50%;float: left;height: ' + $(this).height() + 'px;line-height: ' + $(this).height() + 'px;font-size: 2.6rem;color: red;text-align: center;box-sizing: border-box;border-right: 1px solid white">删除</div>');
        $(config.element).find('.myDelUploadBox').append('<div class="myDelUploadBoxClose" style="width: 50%;float: right;height: ' + $(this).height() + 'px;line-height: ' + $(this).height() + 'px;font-size: 2.6rem;color: white;text-align: center;box-sizing: border-box;border-right: 1px solid white">取消</div>');
    });

    $(config.element).find(config.box).on('click', '.myDelUploadBoxClose', function () {
        $(config.element).find(config.box).find('.myDelUploadBox').remove();
    });

    $(config.element).find(config.box).on('click', '.myDelUploadBoxDel', function () {
        delImg($(this).attr('nowSrc'));
    });

    function addImg(src) {
        $(config.element).find(config.box).append('<img src="' + src + '">');
        $(config.element).find('.myUploadResult').val(function (k, now) {
            return now ? now + config.limit + src : src;
        });
    }

    function delImg(src) {
        $.getJSON(config.removeImgUrl, {src: src}, function (res) {
            if (res.type) {
                $(config.element).find(config.box).find('[src="' + src + '"]').remove();
                $(config.element).find(config.box).find('.myDelUploadBox').remove();
                $(config.element).find('.myUploadResult').val(function (k, now) {
                    return replace(now, src)
                });
            } else {
                layer.msg(res.msg);
            }
        });
    }

    function replace(str, del) {
        if (str === del) {
            return '';
        }
        var arr = [];
        str.split(config.limit).forEach(function (t, number) {
            if (t && t !== del) {
                arr.push(t);
            }
        });
        return arr.join(config.limit);
    }

}