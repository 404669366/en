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
                    <label class="col-sm-3 control-label">场地信息介绍</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" readonly><?= $model->intro ?></textarea>
                    </div>
                </div>
                <?php if ($model->status == 11): ?>
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
                <?php else: ?>
                    //图片墙

                <?php endif; ?>
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
                <?php if ($model->status == 9): ?>
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
                <?php else: ?>
                    //图片墙

                <?php endif; ?>
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
                <?php if ($model->status == 7): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">备案图片</label>
                        <div class="col-sm-8">
                            <div class="i"></div>
                        </div>
                    </div>
                    <script>

                    </script>
                <?php endif; ?>
            </div>
            <div class="col-sm-6">
                <?php if ($model->status == 10): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">变压器图纸</label>
                        <div class="col-sm-8">
                            <div class="i"></div>
                        </div>
                    </div>
                    <script>

                    </script>
                <?php endif; ?>
                <?php if ($model->status == 10): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">施工图纸</label>
                        <div class="col-sm-8">
                            <div class="i"></div>
                        </div>
                    </div>
                    <script>

                    </script>
                <?php endif; ?>
                <?php if ($model->status == 10): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">预算报表</label>
                        <div class="col-sm-8">
                            <div class="i"></div>
                        </div>
                    </div>
                    <script>

                    </script>
                <?php endif; ?>
                <?php if ($model->status == 14): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">电力证明</label>
                        <div class="col-sm-8">
                            <div class="i"></div>
                        </div>
                    </div>
                    <script>

                    </script>
                <?php endif; ?>
                <?php if ($model->status == 19): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">投资方合同</label>
                        <div class="col-sm-8">
                            <div class="i"></div>
                        </div>
                    </div>
                    <script>

                    </script>
                <?php endif; ?>
                <?php if ($model->status == 10): ?>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">预算总金额</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="<?= $model->budget ?>" readonly>
                        </div>
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
                        <button class="btn btn-white back">返回</button>
                        <?php if (in_array($model->status, [9, 11])): ?>
                            <button type="submit" class="btn btn-white">确认提交</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>