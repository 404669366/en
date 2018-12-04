<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="row">
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">意向编号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->no ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">投资人电话</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="<?= $model->investor->tel ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地编号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->field->no ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">预购金额</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="<?= $model->money ?>" readonly>
                </div>
            </div>
            <?php if ($model->status >= 2): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">分成比例</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                               placeholder="<?= $model->ratio ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">投资合同</label>
                    <div class="col-sm-9">
                        <div class="la0"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la0',
                            image: '<?=$model->contract_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">转账凭证</label>
                    <div class="col-sm-9">
                        <div class="la1"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la1',
                            image: '<?=$model->money_audit?>',
                        });
                    </script>
                </div>
            <?php endif; ?>
            <?php if (in_array($model->status, [1, 4])): ?>
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
                <label class="col-sm-3 control-label">意向状态</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= \vendor\helpers\Constant::getIntentionStatus()[$model->status] ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <?php if ($model->status == 2): ?>
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
                                                window.location.href = '/audit/fourth/no-pass?id=<?=$model->id?>&remark=' + remark;
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
                    <?php if ($model->status == 2): ?>
                        <a href="/audit/fourth/pass?id=<?= $model->id ?>" class="btn btn-white">通过</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>