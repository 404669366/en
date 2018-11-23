<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" class="form-control" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">用户电话号码</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->user->tel ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地位置</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->area->full_name ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">详细地址</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->address ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">场地图片</label>
                    <div class="col-sm-8">
                        <div class="adawd"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 8,
                        name: 'image',
                        height: 12,
                        element: '.adawd',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->image?>'
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">配置单图片</label>
                    <div class="col-sm-8">
                        <div class="p"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 1,
                        name: 'configure_photo',
                        height: 12,
                        element: '.p',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                    });
                </script>
            </div>
            <div class="col-sm-6">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">场地证明图片</label>
                    <div class="col-sm-8">
                        <div class="i"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 4,
                        name: 'prove_photo',
                        height: 12,
                        element: '.i',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">场地合同图片</label>
                    <div class="col-sm-8">
                        <div class="f"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 8,
                        name: 'field_photo',
                        height: 12,
                        element: '.f',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地信息介绍</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" readonly><?= $model->intro ?></textarea>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地状态</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $status[$model->status] ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-white abandon" data-toggle="modal"
                                data-target="#myModal2">放弃
                        </button>
                        <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated flipInY">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span
                                                    class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title">请填写放弃说明</h4>
                                    </div>
                                    <div class="modal-body">
                                            <textarea class="remark"
                                                      style="width: 80%;height: 100%; margin: 0 auto;display: block"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                        <button type="button" class="btn btn-primary save">保存</button>
                                    </div>
                                    <script>
                                        $('.save').click(function () {
                                            var remark = $('.remark').val();
                                            if (remark) {
                                                window.location.href = '/commissioner/score/del?id=<?=$model->id?>&remark=' + remark;
                                            } else {
                                                layer.msg('请填写放弃说明');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-white back">返回</button>
                        <button type="submit" class="btn btn-white">确认提交</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>