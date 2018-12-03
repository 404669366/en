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
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">场地标题</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" placeholder="<?= $model->title ?>"
                           readonly>
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
                    <div class="adawd"></div>
                </div>
            </div>
            <script>
                picWall({
                    element: '.adawd',
                    image: '<?=$model->image?>',
                })
            </script>
            <?php if (in_array($model->status, [4, 5]) || $model->status >= 8): ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">配置单图片</label>
                    <div class="col-sm-9">
                        <div class="rgrewwef"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.rgrewwef',
                        image: '<?=$model->configure_photo?>',
                    })
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地证明图片</label>
                    <div class="col-sm-9">
                        <div class="hgerge"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.hgerge',
                        image: '<?=$model->prove_photo?>',
                    })
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地合同图片</label>
                    <div class="col-sm-9">
                        <div class="hgyjtyj"></div>
                    </div>
                </div>
                <script>
                    picWall({
                        element: '.hgyjtyj',
                        image: '<?=$model->field_photo?>',
                    })
                </script>
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
                </div>
            </div>
        </div>
    </form>
</div>