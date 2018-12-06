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
            <?php if (in_array($model->status, [10, 11])): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">变压器图纸</label>
                    <div class="col-sm-9">
                        <div class="kklvaskdjh"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.kklvaskdjh',
                            image: '<?=$model->transformer_drawing?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">施工图纸</label>
                    <div class="col-sm-9">
                        <div class="qweoiual"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.qweoiual',
                            image: '<?=$model->field_drawing?>',
                        });
                    </script>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">预算报表</label>
                    <div class="col-sm-9">
                        <div class="ppwqelkjasd"></div>
                    </div>
                    <script>
                        picWall({
                            element: '.ppwqelkjasd',
                            image: '<?=$model->budget_photo?>',
                        });
                    </script>
                </div>
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
            <?php else: ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">变压器图纸</label>
                    <div class="col-sm-9">
                        <div class="asdfskjdfh"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 4,
                        name: 'transformer_drawing',
                        height: 12,
                        element: '.asdfskjdfh',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->transformer_drawing?>',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">施工图纸</label>
                    <div class="col-sm-9">
                        <div class="osidujlksadjkl"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 4,
                        name: 'field_drawing',
                        height: 12,
                        element: '.osidujlksadjkl',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->field_drawing?>',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">预算报表</label>
                    <div class="col-sm-9">
                        <div class="kmloknuygyu"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max: 4,
                        name: 'budget_photo',
                        height: 12,
                        element: '.kmloknuygyu',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete',
                        default: '<?=$model->budget_photo?>',
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地面积</label>
                    <div class="col-sm-4">
                        <input type="text" name="areas" class="form-control" value="<?= $model->areas ?>"
                               placeholder="㎡">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">预算总金额</label>
                    <div class="col-sm-4">
                        <input type="text" name="budget" class="form-control" value="<?= $model->budget ?>">
                    </div>
                </div>
            <?php endif; ?>
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
                <div class="col-sm-8 col-sm-offset-3">
                    <button class="btn btn-white back">返回</button>
                    <?php if (in_array($model->status, [8, 12])): ?>
                        <button class="btn btn-white" type="submit">确认提交</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>
