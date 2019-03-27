document.write("<link href='/resources/css/form.css' rel='stylesheet'>");
document.write("<link href='/swiper/swiper.min.css' rel='stylesheet'>");
document.write("<script src='/swiper/swiper.min.js' type='text/javascript' charset='utf-8'></script>");
document.write("<script src='/lrz/lrz.all.bundle.js' type='text/javascript' charset='utf-8'></script>");
window.select = function () {

    window.load(function () {
        $('.selectModalContent').on('click', 'div', function () {
            $($('.selectModalContent').attr('node')).val($(this).text());
            $('[name="' + $('.selectModalContent').attr('inputName') + '"]').val($(this).attr('k'));
            window.modal.close('.selectModalBox');
        });
        $('.selectModalClose').on('click', function () {
            window.modal.close('.selectModalBox');
        })
    });

    function add() {
        if (!$('.selectModalBox').length) {
            $('body').append('' +
                '<div class="selectModalBox" style="display: none;">' +
                '    <div class="selectModalTitle"></div>' +
                '    <div class="selectModalClose"><i class="fa fa-times" aria-hidden="true"></i></div>' +
                '    <div class="selectModalContent"></div>' +
                '</div>');
        }
    }

    return {
        load: function (node, name) {
            add();
            $(node)
                .attr('node', node)
                .attr('inputName', name)
                .attr('title', $(node).attr('placeholder'))
                .after('<input type="hidden" name="' + name + '" value="">');
            $(node).click(function () {
                window.modal.open('.selectModalBox');
                $('.selectModalTitle').text($(this).attr('title'));
                var json = $(this).attr('data');
                if (json) {
                    var now = $('[name="' + $(this).attr('inputName') + '"]').val();
                    var str = '';
                    $.each(JSON.parse(json), function (k, v) {
                        str += '<div k="' + k + '" class="' + (k === now ? 'selected' : '') + '">' + v + '</div>';
                    });
                    $('.selectModalContent')
                        .attr('node', $(this).attr('node'))
                        .attr('inputName', $(this).attr('inputName'))
                        .html(str);
                    if ($('.selected').length) {
                        $('.selectModalContent').scrollTop(0).scrollTop($('.selected').position().top - $('.selected').height());
                    }
                }
            });
        }
    }
};
window.intro = function () {

    window.load(function () {
        $('.introModalClose').on('click', function () {
            if ($('.introModalContent').attr('inputName')) {
                $($('.introModalContent').attr('node')).val($('.introModalContent').val());
                $('[name="' + $('.introModalContent').attr('inputName') + '"]').val($('.introModalContent').val());
            }
            window.modal.close('.introModalBox');
        });
    });

    function add() {
        if (!$('.introModalBox').length) {
            $('body').append('' +
                '<div class="introModalBox" style="display: none;">' +
                '    <div class="introModalTitle">内容详情</div>' +
                '    <div class="introModalClose"><i class="fa fa-times" aria-hidden="true"></i></div>' +
                '    <textarea class="introModalContent" readonly></textarea>' +
                '</div>');
        }
    }

    return {
        load: function (node, name) {
            add();
            if (name) {
                $(node)
                    .attr('node', node)
                    .attr('inputName', name)
                    .after('<input type="hidden" name="' + name + '" value="' + ($(node).attr('data') || '') + '">');
            }
            $(node).click(function () {
                window.modal.open('.introModalBox');
                $('.introModalContent').text($(this).attr('data') || '');
                if ($(this).attr('inputName')) {
                    $('.introModalContent')
                        .attr('node', $(this).attr('node'))
                        .attr('inputName', $(this).attr('inputName'))
                        .prop('readonly', false);
                }
            });
        }
    }
};
window.area = function () {

    window.load(function () {
        var times = 1;
        var name = [];
        var select = [];
        getData();
        $('.areaModalContent').on('click', 'div', function () {
            if (times === 3) {
                name[2] = $(this).text();
                $($('.areaModalContent').attr('node')).val(name.join(' '));
                $('[name="' + $('.areaModalContent').attr('inputName') + '"]').val($(this).attr('k'));
                window.modal.close('.areaModalBox');
                times = 1;
                name = [];
                select[2] = $(this).attr('k');
                $('.areaModalBack').hide();
                getData();
            } else if (times === 2) {
                times++;
                name [1] = $(this).text();
                select[1] = $(this).attr('k');
                $('.areaModalBack').show();
                getData($(this).attr('k'));
            } else {
                times++;
                name[0] = $(this).text();
                select[0] = $(this).attr('k');
                $('.areaModalBack').show();
                getData($(this).attr('k'));
            }
        });

        $('.areaModalBack').hide().on('click', function () {
            if (times === 3) {
                times = 2;
                getData(select[0]);
            } else if (times === 2) {
                times = 1;
                $(this).hide();
                getData();
            }
        });

        $('.areaModalClose').click(function () {
            window.modal.close('.areaModalBox');
        });

        function getData(pid) {
            $('.areaModalContent').html('');
            $.getJSON('/basis/area/data.html', {pid: (pid || 0)}, function (re) {
                if (re.type) {
                    var str = '';
                    $.each(re.data, function (k, v) {
                        str += '<div k="' + v.area_id + '" class="' + (select.indexOf(v.area_id) === -1 ? '' : 'selected') + '">' + v.area_name + '</div>';
                    });
                    $('.areaModalContent').html(str);
                    if ($('.selected').length) {
                        if ($('.areaModalContent').parent('div').css('display') === 'none') {
                            $('.areaModalContent').parent('div').css('display', 'block');
                            $('.areaModalContent').scrollTop(0).scrollTop($('.selected').position().top - $('.selected').height());
                            $('.areaModalContent').parent('div').css('display', 'none');
                        } else {
                            $('.areaModalContent').scrollTop(0).scrollTop($('.selected').position().top - $('.selected').height());
                        }
                    }
                }
            });
        }
    });

    function add() {
        if (!$('.areaModalBox').length) {
            $('body').append('' +
                '<div class="areaModalBox">' +
                '    <div class="areaModalBack"><i class="fa fa-angle-left" aria-hidden="true"></i></div>' +
                '    <div class="areaModalTitle">选择地区</div>' +
                '    <div class="areaModalClose"><i class="fa fa-times" aria-hidden="true"></i></div>' +
                '    <div class="areaModalContent"></div>' +
                '</div>');
        }
    }

    return {
        load: function (node, name) {
            add();
            $(node)
                .attr('node', node)
                .attr('inputName', name)
                .after('<input type="hidden" name="' + name + '" value="">');
            $(node).click(function () {
                window.modal.open('.areaModalBox');
                $('.areaModalContent')
                    .attr('node', $(this).attr('node'))
                    .attr('inputName', $(this).attr('inputName'));
            });
        }
    };
};
window.wall = function () {
    window.load(function () {
        $('.wallModalClose').click(function () {
            window.modal.close('.wallModalBox');
        });
    });

    function add() {
        if (!$('.wallModalBox').length) {
            $('body').append(
                '<div class="wallModalBox">' +
                '   <div class="wallModalClose"><i class="fa fa-times" aria-hidden="true"></i></div>' +
                '   <div class="pagination"></div>' +
                '   <div class="wallModalContent">' +
                '       <span>' +
                '           <div class="swiper-container"><div class="swiper-wrapper"></div></div>' +
                '       </span>' +
                '   </div>' +
                '</div>');
            $('.swiper-wrapper').on('click', 'img', function () {
                console.log($(this).attr('src'));
            })
        }
    }

    return {
        load: function (node) {
            add();
            $(node).on('click', function () {
                var str = '';
                var count = 0;
                $.each($(this).attr('data').split(','), function (k, v) {
                    if (v) {
                        count++;
                        str += '<span class="swiper-slide"><img src="' + v + '"/></span>';
                    }
                });
                $('.wallModalContent').find('.swiper-wrapper').html(str);
                window.modal.open('.wallModalBox');
                new Swiper('.swiper-container', {
                    initialSlide: count - 1,
                    pagination: {
                        el: '.pagination',
                        type: 'fraction',
                        renderFraction: function (currentClass, totalClass) {
                            return '<span class="' + currentClass + '"></span>' +
                                ' / ' +
                                '<span class="' + totalClass + '"></span>';
                        },
                    },
                    loop: true,
                    observer: true,
                    observeParents: true,
                });
            });
        }
    };
};
window.uploadImg = function () {
    function add() {
        if (!$('.uploadImgModalBox').length) {
            $('body')
                .append(
                    '<div class="uploadImgModalBox" style="display: none;">' +
                    '    <div class="uploadImgModalTitle">内容详情</div>' +
                    '    <div class="uploadImgModalClose"><i class="fa fa-times" aria-hidden="true"></i></div>' +
                    '    <div class="uploadImgModalContent"></div>' +
                    '    <input type="file" class="uploadImgModalFileNode" style="display: none"/>' +
                    '</div>')
                .append(
                    '<div class="uploadImgModalLookBox">' +
                    '   <div class="uploadImgModalLookClose"><i class="fa fa-times" aria-hidden="true"></i></div>' +
                    '   <div class="uploadImgModalLookContent">' +
                    '       <span><img src=""></span>' +
                    '   </div>' +
                    '</div>')
                .append(
                    '<div class="uploadImgModalLookSureBox">' +
                    '   <div><span>' +
                    '       <div class="uploadImgModalLookSureContent">' +
                    '           <div class="uploadImgModalLookSureTitle">您确定要删除此图片吗?</div>' +
                    '           <div class="uploadImgModalLookSureBtn">' +
                    '               <button class="uploadImgModalLookSureClose" type="button">取消</button>' +
                    '               <button class="uploadImgModalLookSureDel" type="button">删除</button>' +
                    '           </div>' +
                    '       </div>' +
                    '   </span></div>' +
                    '</div>');

            $('.uploadImgModalClose').click(function () {
                window.modal.close('.uploadImgModalBox');
            });

            $('.uploadImgModalLookClose').click(function () {
                window.modal.close('.uploadImgModalLookBox');
            });
            $('.uploadImgModalLookSureClose').click(function () {
                window.modal.close('.uploadImgModalLookSureBox');
            });

            $('.uploadImgModalContent').on('click', 'img', function () {
                if ($(this).hasClass('uploadImgModalAdd')) {
                    var nowValue = $('[name="' + $(this).attr('inputName') + '"]').val();
                    nowValue = $.grep(nowValue.split(','), function (n, i) {
                        return n;
                    }, false);
                    if ($(this).attr('fileMax') > nowValue.length) {
                        $('.uploadImgModalFileNode')
                            .attr('node', $(this).attr('node'))
                            .attr('inputName', $(this).attr('inputName'))
                            .val('')
                            .click();
                    } else {
                        layer.msg('<span style="font-size:0.46rem;height:100%;line-height:100%">最多上传' + $(this).attr('fileMax') + '张图片</span>');
                    }
                } else {
                    $('.uploadImgModalLookContent>span>img')
                        .attr('src', $(this).attr('src'))
                        .attr('node', $(this).attr('node'))
                        .attr('inputName', $(this).attr('inputName'));
                    window.modal.open('.uploadImgModalLookBox');
                }
            });

            $('.uploadImgModalFileNode').on('change', function () {
                var inputName = $(this).attr('inputName');
                var nodeName = $(this).attr('node');
                var path = $(this).val();
                if (path.length === 0) {
                    layer.msg('<span style="font-size:0.46rem;height:100%;line-height:100%">请上传图片</span>');
                    return false;
                } else {
                    var extStart = path.lastIndexOf('.'),
                        ext = path.substring(extStart, path.length).toUpperCase();
                    if (ext !== '.PNG' && ext !== '.JPG' && ext !== '.JPEG') {
                        layer.msg('<span style="font-size:0.46rem;height:100%;line-height:100%">图片格式错误</span>');
                        return false;
                    }
                }
                var file = $(this)[0].files[0];
                lrz(file, {quality: 0.6}).then(function (re) {
                    file = new File([re.file], file.name, {type: file.type});
                    var formData = new FormData();
                    formData.append('file', file);
                    $.ajax({
                        url: '/basis/file/upload.html',
                        cache: false,
                        type: "post",
                        data: formData,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (res) {
                            layer.msg('<span style="font-size:0.46rem;height:100%;line-height:100%">' + res.msg + '</span>');
                            if (res.type) {
                                $('[name="' + inputName + '"]').val(function (i, ovl) {
                                    ovl = $.grep(ovl.split(','), function (n, i) {
                                        return n;
                                    }, false);
                                    ovl.push(res.data);
                                    ovl = ovl.join(',');
                                    $(nodeName).attr('data', ovl);
                                    return ovl;
                                });
                                $('.uploadImgModalAdd').before('<img node="' + nodeName + '" inputName="' + inputName + '" src="' + res.data + '" />');
                            }
                        }
                    });
                }).catch(function (err) {
                    layer.msg('<span style="font-size:0.46rem;height:100%;line-height:100%">图片压缩失败</span>');
                });
            });

            $('.uploadImgModalLookContent').on('click', 'img', function () {
                if ($(this).attr('inputName')) {
                    $('.uploadImgModalLookSureDel')
                        .attr('node', $(this).attr('node'))
                        .attr('inputName', $(this).attr('inputName'))
                        .attr('imgUrl', $(this).attr('src'));
                    window.modal.open('.uploadImgModalLookSureBox');
                }
            });

            $('.uploadImgModalLookSureDel').on('click', function () {
                var nodeName = $(this).attr('node');
                var inputName = $(this).attr('inputName');
                var src = $(this).attr('imgUrl');
                $.getJSON('/basis/file/delete.html', {src: src}, function (res) {
                    if (res.type) {
                        $('[name="' + inputName + '"]').val(function (i, ovl) {
                            ovl = ovl.replace(src, '');
                            ovl = $.grep(ovl.split(','), function (n, i) {
                                return n;
                            }, false);
                            ovl = ovl.join(',');
                            $(nodeName).attr('data', ovl);
                            return ovl;
                        });
                        $('.uploadImgModalContent').find('[src="' + src + '"]').remove();
                        window.modal.close('.uploadImgModalLookSureBox');
                        window.modal.close('.uploadImgModalLookBox');
                        layer.msg('<span style="font-size:0.46rem;height:100%;line-height:100%">删除成功</span>');
                    } else {
                        window.modal.close('.uploadImgModalLookSureBox');
                        window.modal.close('.uploadImgModalLookBox');
                        layer.msg('<span style="font-size:0.46rem;height:100%;line-height:100%">' + res.msg + '</span>');
                    }
                })
            });

        }
    }

    return {
        load: function (node, name, max) {
            add();
            if (name) {
                $(node)
                    .attr('node', node)
                    .attr('inputName', name)
                    .attr('fileMax', max || 1)
                    .after('<input type="hidden" name="' + name + '" value="' + ($(node).attr('data') || '') + '">');
            }

            $(node).on('click', function () {
                var nodeName = $(this).attr('node') || '';
                var inputName = $(this).attr('inputName') || '';
                var str = '';
                var data = $(this).attr('data') || '';
                $.each(data.split(','), function (k, v) {
                    if (v) {
                        str += '<img node="' + nodeName + '" inputName="' + inputName + '" src="' + v + '" />';
                    }
                });
                if ($(this).attr('inputName')) {
                    str += '<img class="uploadImgModalAdd" node="' + nodeName + '" inputName="' + inputName + '" fileMax="' + $(this).attr('fileMax') + '" src="/resources/img/add.jpg" />';
                }
                $('.uploadImgModalContent').html(str);
                window.modal.open('.uploadImgModalBox');
            });
        }
    };
};