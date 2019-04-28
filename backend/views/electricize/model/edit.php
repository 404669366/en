<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩型号</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" value="<?= $model->name ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩品牌</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="brand" value="<?= $model->brand ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电压</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="voltage" value="<?= $model->voltage ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电流</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="current" value="<?= $model->current ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">功率</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="power" value="<?= $model->power ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电桩类型</label>
            <div class="col-sm-2">
                <select class="form-control m-b" name="type">
                    <?php foreach (\vendor\helpers\Constant::getModelType() as $k => $v): ?>
                        <option value="<?= $k ?>" <?= $model->type == $k ? "selected" : "" ?>><?= $v ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">标准</label>
            <div class="col-sm-2">
                <select class="form-control m-b" name="standard">
                    <?php foreach (\vendor\helpers\Constant::getModelStandard() as $k => $v): ?>
                        <option value="<?= $k ?>" <?= $model->standard == $k ? "selected" : "" ?>><?= $v ?></option>
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