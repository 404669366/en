<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="row">
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地编号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->no ?>" readonly>
                </div>
            </div>
            <?php if ($model->type == 1): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">专员</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                               placeholder="<?= $model->member->username ?>" readonly>
                    </div>
                </div>
            <?php else: ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">合伙人电话</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                               placeholder="<?= $model->cobber->tel ?>" readonly>
                    </div>
                </div>
            <?php endif;?>
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
                <label class="col-sm-3 control-label">场地图片</label>
                <div class="col-sm-9">
                    <div class="la0"></div>
                </div>
                <script>
                    picWall({
                        element: '.la0',
                        image: '<?=$model->image?>',
                    });
                </script>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">配置单图片</label>
                <div class="col-sm-9">
                    <div class="la1"></div>
                </div>
                <script>
                    picWall({
                        element: '.la1',
                        image: '<?=$model->configure_photo?>',
                    });
                </script>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">施工图纸</label>
                <div class="col-sm-9">
                    <div class="la1"></div>
                </div>
                <script>
                    picWall({
                        element: '.la1',
                        image: '<?=$model->field_drawing?>',
                    });
                </script>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">变压器图纸</label>
                <div class="col-sm-9">
                    <div class="la2"></div>
                </div>
                <script>
                    picWall({
                        element: '.la2',
                        image: '<?=$model->transformer_drawing?>',
                    });
                </script>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">预算报表</label>
                <div class="col-sm-9">
                    <div class="la3"></div>
                </div>
                <script>
                    picWall({
                        element: '.la3',
                        image: '<?=$model->budget_photo?>',
                    });
                </script>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地面积</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->areas ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">预算金额</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->budget ?>" readonly>
                </div>
            </div>
            <?php if ($model->status == 12): ?>
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
                <div class="col-sm-4 col-sm-offset-3">
                    <?php if ($model->status == 10): ?>
                        <button type="button" class="btn btn-white abandon" data-toggle="modal"
                                data-target="#myModal2">不通过
                        </button>
                        <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated flipInY">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span
                                                    class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title">请填写不通过说明</h4>
                                    </div>
                                    <div class="modal-body">
                                            <textarea class="remark"
                                                      style="width: 80%;height: 100%; margin: 0 auto;display: block"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭
                                        </button>
                                        <button type="button" class="btn btn-primary save">保存</button>
                                    </div>
                                    <script>
                                        $('.save').click(function () {
                                            var remark = $('.remark').val();
                                            if (remark) {
                                                window.location.href = '/audit/second/no-pass?id=<?=$model->id?>&remark=' + remark;
                                            } else {
                                                layer.msg('请填写不通过说明');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <button class="btn btn-white back">返回</button>
                    <?php if ($model->status == 10): ?>
                        <a href="/audit/second/pass?id=<?= $model->id ?>" class="btn btn-white">通过</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>