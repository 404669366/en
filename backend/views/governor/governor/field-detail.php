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
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地类型</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $types[$model->type] ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地标题</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" placeholder="<?= $model->title ?>" readonly>
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
                <label class="col-sm-3 control-label">场地介绍</label>
                <div class="col-sm-4">
                    <textarea class="form-control" readonly><?= $model->intro ?></textarea>
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
            <?php if (in_array($model->status, [4, 5]) || $model->status >= 8): ?>
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
            <?php endif; ?>
            <?php if ($model->status == 8 || $model->status >= 10): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">备案图片</label>
                    <div class="col-sm-9">
                        <div class="ghjmgyjy"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.ghjmgyjy',
                        image: '<?=$model->record_photo?>',
                    })
                </script>
            <?php endif; ?>
            <?php if (in_array($model->status, [10, 11]) || $model->status >= 13): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">变压器图纸</label>
                    <div class="col-sm-9">
                        <div class="btgherg"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.btgherg',
                        image: '<?=$model->transformer_drawing?>',
                    })
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">施工图纸</label>
                    <div class="col-sm-9">
                        <div class="ftjrtg"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.ftjrtg',
                        image: '<?=$model->field_drawing?>',
                    })
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">预算报表</label>
                    <div class="col-sm-9">
                        <div class="tydrvffsdcv"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.tydrvffsdcv',
                        image: '<?=$model->budget_photo?>',
                    })
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地面积</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->areas . '㎡' ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">预算总金额</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->budget ?>" readonly>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (in_array($model->status, [14, 15]) && $model->status >= 17): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">合伙人电话</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                               placeholder="<?= $model->cobber->tel ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">电力证明</label>
                    <div class="col-sm-9">
                        <div class="nedgwer"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.nedgwer',
                        image: '<?=$model->power_photo?>',
                    })
                </script>
            <?php endif; ?>
            <?php if (in_array($model->status, [3, 7, 13, 17])): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">放弃说明</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" readonly><?= $model->remark ?></textarea>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (in_array($model->status, [6, 12, 16])): ?>
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
                <label class="col-sm-3 control-label">场地状态</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                           placeholder="<?= $status[$model->status] ?>" readonly>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-8">
                    <?php if (in_array($model->status, [3, 7])): ?>
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
                                        <h4 class="modal-title">请指派专员</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">专员</label>
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
                                                window.location.href = '/governor/governor/field-recover3?id=<?=$model->id?>&mid=' + mid;
                                            } else {
                                                layer.msg('请选择专员');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array($model->status, [13, 17])): ?>
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
                                        <h4 class="modal-title">请指派合伙人</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">合伙人</label>
                                            <div class="col-sm-4">
                                                <select class="form-control cobber">
                                                    <?php foreach ($cobbers as $cobber): ?>
                                                        <option value="<?= $cobber['id'] ?>"><?= $cobber['tel'] ?></option>
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
                                            var mid = $('.$cobber').val();
                                            if (mid) {
                                                window.location.href = '/governor/governor/field-recover17?id=<?=$model->id?>&mid=' + mid;
                                            } else {
                                                layer.msg('请选择合伙人');
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
    </form>
</div>