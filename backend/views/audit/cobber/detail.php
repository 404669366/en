<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="row">
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">用户电话</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" placeholder="<?= $model->cobber->tel ?>"
                           readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">真实姓名</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $model->name ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">用户类型</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $types[$model->type] ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">地理位置</label>
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
                <label class="col-sm-3 control-label">银行卡号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="<?= $model->bank_no ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">银行类型</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $bank[$model->bank_type] ?>" readonly>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">身份证正面</label>
                <div class="col-sm-9">
                    <div class="la0"></div>
                </div>
                <script>
                    picWall({
                        element: '.la0',
                        image: '<?=$model->card_positive?>',
                    });
                </script>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">身份证反面</label>
                <div class="col-sm-9">
                    <div class="la1"></div>
                </div>
                <script>
                    picWall({
                        element: '.la1',
                        image: '<?=$model->card_opposite?>',
                    });
                </script>
            </div>
            <?php if ($model->status >= 3): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">打款凭证</label>
                    <div class="col-sm-9">
                        <div class="la0"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la0',
                            image: '<?=$model->money_ident?>',
                        });
                    </script>
                </div>
            <?php endif; ?>
            <?php if (in_array($model->status, [2, 5])): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">驳回说明</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" readonly><?= $model->remark ?></textarea>
                    </div>
                </div>
            <?php endif; ?>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">用户状态</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $status[$model->status] ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <?php if (in_array($model->status, [0, 3])): ?>
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
                                                window.location.href = '/audit/cobber/no-pass?id=<?=$model->id?>&remark=' + remark;
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
                    <?php if (in_array($model->status, [0, 3])): ?>
                        <a href="/audit/cobber/pass?id=<?= $model->id ?>" class="btn btn-white">通过</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>