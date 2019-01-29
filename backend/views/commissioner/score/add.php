<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="row">
            <div class="form-group">
                <label class="col-sm-3 control-label">场地方</label>
                <div class="col-sm-4 userBoxKeyBox">
                    <input type="hidden" class="form-control local_id" name="local_id">
                    <input type="text" class="form-control userBoxKey" placeholder="输入场地方电话搜索">
                    <div class="userBox"></div>
                    <style>
                        .userBox {
                            overflow-y: scroll;
                            width: 100%;
                            max-height: 15rem;
                            border-bottom: 1px solid rgb(229, 230, 231);
                            border-left: 1px solid rgb(229, 230, 231);
                            border-right: 1px solid rgb(229, 230, 231);
                        }

                        .userBox > .userOne {
                            box-sizing: border-box;
                            width: 100%;
                            padding: 0 4rem;
                            height: 3rem;
                            line-height: 3rem;
                            border-bottom: 1px solid rgb(229, 230, 231);
                            cursor: pointer;
                        }

                        .userBox > .userOne:last-child {
                            border-bottom: none;
                        }

                        .userBox > .userOne:hover, .userBoxKeyBox > .search:hover {
                            background: #dadada;
                        }
                    </style>
                    <script>
                        $('.userBox').on('click', '.userOne', function () {
                            $('.userBox').find('.userOne').css('background', '#fff');
                            $(this).css('background', '#dadada');
                            $('.local_id').val($(this).attr('ids'));
                        });
                        $('.userBoxKeyBox').on('input propertychange','.userBoxKey',function () {
                            $.getJSON('/commissioner/score/search', {tel: $(this).val()}, function (re) {
                                if (re.type) {
                                    var str = '';
                                    $.each(re.data, function (k, v) {
                                        str += '<div ids="'+v.id+'" class="userOne">' + v.tel + '</div>';
                                    });
                                    $('.userBox').html(str || '<div class="userOne">该账户不存在</div>');
                                } else {
                                    layer.msg(re.msg);
                                }
                            })
                        });
                    </script>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地标题</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" value="">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group areaaaa">
                <label class="col-sm-3 control-label">场地位置</label>
                <div class="col-sm-4">
                    <div class="area"></div>
                    <script>
                        area({
                            element: '.area',
                            modify: true,
                            areaName: 'area_id',
                            latName: 'lat',
                            lngName: 'lng',
                        });
                    </script>
                </div>
            </div>
            <style>
                .areaaaa .row {
                    margin: 0 0 !important;
                }
            </style>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">详细地址</label>
                <div class="col-sm-4">
                    <input type="text" name="address" class="form-control">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地介绍</label>
                <div class="col-sm-4">
                    <textarea name="intro" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地图片</label>
                <div class="col-sm-4">
                    <div class="aaaaa"></div>
                </div>
            </div>
            <script>
                upload({
                    max: 8,
                    name: 'image',
                    height: 16,
                    element: '.aaaaa',
                    uploadImgUrl: '/basis/file/upload',
                    removeImgUrl: '/basis/file/delete',
                });
            </script>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary ">提交</button>
                </div>
            </div>
        </div>
    </form>
</div>