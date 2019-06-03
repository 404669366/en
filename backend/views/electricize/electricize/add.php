<?php $this->registerJsFile('/qrCode/qrCode.js', ['depends' => 'app\assets\ModelAsset']); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩编号</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="no" value="<?= $no ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">枪口数量</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="gunpoint" value="<?= $num ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">枪口二维码</label>
            <div class="col-sm-10 row">
                <?php for ($i = $num; $i > 0; $i--): ?>
                    <div class="col-sm-3
                     qrCode<?= $i ?>"></div>
                    <script>
                        $('.qrCode<?= $i ?>').makeCode({
                            width: 160,
                            height: 160,
                            text: '<?='?no=' . $no . '&gun=' . ($i - 1)?>'
                        });
                    </script>
                <?php endfor; ?>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩型号</label>
            <div class="col-sm-2">
                <select class="form-control m-b" name="model_id">
                    <?php foreach (\vendor\en\Electricize::getModel() as $k => $v): ?>
                        <option value="<?= $k ?>"><?= $v ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩所在区域</label>
            <div class="col-sm-2">
                <select class="form-control m-b" name="field_id">
                    <?php foreach (\vendor\en\Electricize::getField() as $k => $v): ?>
                        <option value="<?= $k ?>"><?= $v ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩收费配置</label>
            <div class="col-sm-2">
                <select class="form-control m-b" name="section_id">
                    <?php foreach (\vendor\en\Electricize::getSection() as $k => $v): ?>
                        <option value="<?= $k ?>" <?= $k == 1 ? "selected" : "" ?>><?= $v ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit">保存内容</button>
                <button class="btn btn-white back">返回</button>
            </div>
        </div>
    </form>
</div>