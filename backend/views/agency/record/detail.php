<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="row">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地编号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->no ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">专员</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->member->username ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地电话</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="<?= $model->local->tel ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地位置</label>
                <div class="col-sm-9">
                    <div class="area"></div>
                    <script>
                        area({
                            element: '.area',
                            modify: false,
                            area: '<?=$model->area_id?>',
                            lat: '<?=$model->lat?>',
                            lng: '<?=$model->lng?>',
                        });
                    </script>
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
                <label class="col-sm-3 control-label">场地证明</label>
                <div class="col-sm-9">
                    <div class="la2"></div>
                </div>
                <script>
                    picWall({
                        element: '.la2',
                        image: '<?=$model->prove_photo?>',
                    });
                </script>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地合同</label>
                <div class="col-sm-9">
                    <div class="la3"></div>
                </div>
                <script>
                    picWall({
                        element: '.la3',
                        image: '<?=$model->field_photo?>',
                    });
                </script>
            </div>
            <?php if ($model->status == 8): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">备案图片</label>
                    <div class="col-sm-9">
                        <div class="gujtrfhdr"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.gujtrfhdr',
                            image: '<?=$model->record_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">备案文件</label>
                    <div class="col-sm-9">
                        <a href="<?= $model->record_file ?>" class="form-control">点击下载</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">备案图片</label>
                    <div class="col-sm-9">
                        <div class="lijlyhugyj"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 4,
                        name: 'record_photo',
                        height: 12,
                        element: '.lijlyhugyj',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->record_photo?>',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">备案文件</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control record_file">
                    </div>
                    <script>
                        uploadFile({
                            element: '.record_file',
                            name: 'record_file',
                            prefix: '<?=$model->no . '-'?>',
                            default: '<?=$model->record_file?>'
                        });
                    </script>
                </div>
            <?php endif; ?>
            <?php if ($model->status == 9): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">说明</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" readonly><?= $model->remark ?></textarea>
                    </div>
                </div>
            <?php endif; ?>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地状态</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $status[$model->status] ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <?php if ($model->status != 8): ?>
                        <button type="button" class="btn btn-white abandon" data-toggle="modal"
                                data-target="#myModal1">备案失败
                        </button>
                        <div class="modal inmodal" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated flipInY">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span
                                                    class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title">请填写备案失败说明</h4>
                                    </div>
                                    <div class="modal-body">
                                            <textarea class="remark1"
                                                      style="width: 80%;height: 100%; margin: 0 auto;display: block"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭
                                        </button>
                                        <button type="button" class="btn btn-primary save1">保存</button>
                                    </div>
                                    <script>
                                        $('.save1').click(function () {
                                            var remark1 = $('.remark1').val();
                                            if (remark1) {
                                                window.location.href = '/agency/record/del?id=<?=$model->id?>&remark=' + remark1;
                                            } else {
                                                layer.msg('请填写说明');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <button class="btn btn-white back">返回</button>
                    <?php if ($model->status != 8): ?>
                        <button class="btn btn-white" type="submit">确认提交</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>
