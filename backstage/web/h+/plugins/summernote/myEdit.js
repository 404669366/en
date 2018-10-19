function myEdit(config) {
    var nowSrc = '';
    var callbacks = {};
    if (config.uploadImgUrl) {
        callbacks = {
            onImageUpload: function (files) {
                var formData = new FormData();
                formData.append('file', files[0]);
                $.ajax({
                    url: config.uploadImgUrl,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if (res.type) {
                            $(config.element).summernote('insertImage', res.data, 'img');
                        } else {
                            console.log(res.msg);
                        }
                    }
                });
            }
        }
    }
    $(config.element).summernote({
        lang: "zh-CN",
        height: config.height ? config.height : 200,
        focus: true,
        callbacks: callbacks
    });

    if (config.removeImgUrl) {
        $('.note-editable').on('mouseover', 'img', function () {
            nowSrc = $(this).prop('src');
        });

        $('.note-image-popover').on('click', '.note-remove', function () {
            $.getJSON(config.removeImgUrl, {src: nowSrc});
        });
    }
}