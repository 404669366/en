<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" class="form-control" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地状态</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="<?= $status[$model->status] ?>" readonly>
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
                    <label class="col-sm-3 control-label">场地标题</label>
                    <div class="col-sm-4">
                        <input type="text" name="title" class="form-control" placeholder="<?= $model->title ?>" readonly>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地介绍</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" readonly><?= $model->intro ?></textarea>
                    </div>
                </div>
                <?php if (in_array($model->status, [6, 9, 11])): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">说明</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" readonly><?= $model->remark ?></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">场地图片</label>
                        <div class="col-sm-9">
                            <div class="rgrefwefw"></div>
                        </div>
                    </div>
                    <script>
                        upload({
                            max: 1,
                            name: 'image',
                            height: 12,
                            element: '.rgrefwefw',
                            uploadImgUrl: '/basis/file/upload',
                            removeImgUrl: '/basis/file/delete',
                            default: '<?=$model->configure_photo?>',
                        });
                    </script>
                <?php else: ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">场地图片</label>
                        <div class="col-sm-9">
                            <div class="rgrefwefw"></div>
                        </div>
                        <script>
                            picWall({
                                element: '.rgrefwefw',
                                image: '<?=$model->image?>',
                            });
                        </script>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-6">
                <?php if (in_array($model->status, [6, 9, 11])): ?>
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
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white back">返回</button>
                        <?php if (in_array($model->status, [6, 9, 11])): ?>
                            <button type="submit" class="btn btn-white">确认提交</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>