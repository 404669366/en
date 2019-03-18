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
            $('[name="' + $('.introModalContent').attr('inputName') + '"]').val($('.introModalContent').val());
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
                    .attr('inputName', name)
                    .after('<input type="hidden" name="' + name + '" value="' + ($(node).attr('data') || '') + '">');
            }
            $(node).click(function () {
                window.modal.open('.introModalBox');
                $('.introModalContent').text($(this).attr('data') || '');
                if ($(this).attr('inputName')) {
                    $('.introModalTitle').text('关闭保存内容');
                    $('.introModalContent').attr('inputName', $(this).attr('inputName')).prop('readonly', false);
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
                '   <div class="wallModalContent"></div>' +
                '</div>');
        }
    }

    return {
        load: function (node) {
            add();
            $(node).on('click', function () {
                var str = '';
                $.each($(this).attr('data').split(','), function (k, v) {
                    if (v) {
                        str += '<img src="' + v + '"/>';
                    }
                });
                $('.wallModalContent').html(str);
                window.modal.open('.wallModalBox');
            });
        }
    };
};