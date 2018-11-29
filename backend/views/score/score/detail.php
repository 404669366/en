<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="row">
            <div class="col-sm-6">
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
                        <div class="la"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.la',
                            image: '<?=$model->image?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">地图</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $model->lng . ' ' . $model->lat ?>"
                               readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地介绍</label>
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
                <?php if ($score): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">评分</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="<?= $score->num ?>" readonly>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">评分说明</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" readonly><?= $score->intro ?></textarea>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <?php if (!$score && $model->status == 0): ?>
                            <button type="button" class="btn btn-white abandon" data-toggle="modal"
                                    data-target="#myModal2">评分
                            </button>
                            <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">&times;</span><span
                                                        class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">请填写评分</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control num" placeholder="分数">
                                            <textarea class="intro"
                                                      style="width: 100%;height: 100%;margin-top: 1rem"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <button type="button" class="btn btn-primary save">保存</button>
                                        </div>
                                        <script>
                                            $('.save').click(function () {
                                                var num = $('.num').val();
                                                var intro = $('.intro').val();
                                                if (intro && num) {
                                                    window.location.href = '/score/score/score?field_id=<?=$model->id?>&intro=' + intro + '&num=' + num;
                                                } else {
                                                    layer.msg('不能为空');
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