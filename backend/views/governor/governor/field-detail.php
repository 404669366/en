<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="row">
            <div class="col-sm-6 ">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地人姓名</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->name ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">联系电话</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->user->tel ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">地域</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->area->full_name ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地位置</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->address ?>" readonly>
                    </div>
                </div>
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
                        <input type="text" class="form-control"
                               placeholder="<?= $status[$model->status] ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地类型</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                               placeholder="<?= $types[$model->status] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">业务员</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                               placeholder="<?= $model->member ? $model->member->username : '未接单' ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地合同</label>
                    <div class="col-sm-9">
                        <div class="la"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la',
                            image: '<?=$model->field_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地证明</label>
                    <div class="col-sm-9">
                        <div class="la"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la',
                            image: '<?=$model->prove_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">备案图片</label>
                    <div class="col-sm-9">
                        <div class="la"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la',
                            image: '<?=$model->record_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">电力证明</label>
                    <div class="col-sm-9">
                        <div class="la"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la',
                            image: '<?=$model->power_photo?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">投资方合同</label>
                    <div class="col-sm-9">
                        <div class="la"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la',
                            image: '<?=$model->invest_photo?>',
                        });
                    </script>
                </div>

                <?php if ($model->member->status == 3): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">放弃说明</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" readonly><?= $model->remark ?></textarea>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-8">
                        <?php if ($model->member->status == 3): ?>
                            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#myModal2">恢复
                            </button>
                            <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">&times;</span><span
                                                        class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">请指派业务员</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">业务员</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control member">
                                                        <?php foreach ($members as $member): ?>
                                                            <option value="<?= $member['id'] ?>"><?= $member['username'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <button type="button" class="btn btn-primary save">保存</button>
                                        </div>
                                        <script>
                                            $('.save').click(function () {
                                                var mid = $('.member').val();
                                                if (mid) {
                                                    window.location.href = '/governor/governor/field-recover?id=<?=$model->id?>&mid=' + mid;
                                                } else {
                                                    layer.msg('请选择业务员');
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <button class="btn btn-white back">返回</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>