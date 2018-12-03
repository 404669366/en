<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" class="form-control" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="row">
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地编号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->no ?>" readonly>
                </div>
            </div>
            <?php if ($model->status == 6): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">配置单图片</label>
                    <div class="col-sm-9">
                        <div class="djrtdhgde"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 1,
                        name: 'configure_photo',
                        height: 12,
                        element: '.djrtdhgde',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->configure_photo?>',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地证明图片</label>
                    <div class="col-sm-9">
                        <div class="hjukugj"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 4,
                        name: 'prove_photo',
                        height: 12,
                        element: '.hjukugj',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->prove_photo?>',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地合同图片</label>
                    <div class="col-sm-9">
                        <div class="tyjtjtj"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 8,
                        name: 'field_photo',
                        height: 12,
                        element: '.tyjtjtj',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->field_photo?>',

                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">驳回说明</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" readonly><?= $model->remark ?></textarea>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
            <?php else: ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">配置单图片</label>
                    <div class="col-sm-9">
                        <div class="djrtdhgde"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.djrtdhgde',
                            image: '<?=$model->configure_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地证明</label>
                    <div class="col-sm-9">
                        <div class="hjukugj"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.hjukugj',
                            image: '<?=$model->prove_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地合同</label>
                    <div class="col-sm-9">
                        <div class="tyjtjtj"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.tyjtjtj',
                            image: '<?=$model->field_photo?>',
                        });
                    </script>
                </div>
            <?php endif; ?>
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
                    <?php if ($model->status == 6): ?>
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
                                                window.location.href = '/commissioner/first/del?id=<?=$model->id?>&remark=' + remark;
                                            } else {
                                                layer.msg('请填写放弃说明');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <button class="btn btn-white back">返回</button>
                    <?php if ($model->status == 6): ?>
                        <button type="submit" class="btn btn-white">确认提交</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>