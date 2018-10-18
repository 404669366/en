<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">业务类型</label>
            <div class="col-sm-2">
                <select class="form-control m-b" name="type">
                    <?php foreach ($types as $k => $v): ?>
                        <option value="<?= $k ?>" <?= $k == $model->type ? 'selected' : '' ?>><?= $v ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-2">
                <select class="form-control m-b" name="status">
                    <?php foreach ($status as $k => $v): ?>
                        <option value="<?= $k ?>" <?= $k == $model->status ? 'selected' : '' ?>><?= $v ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">备注</label>
            <div class="col-sm-2">
                <textarea class="form-control" name="remark" ><?= $model->remark ?></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit">保存内容</button>
                <button class="btn btn-white back">返回</button>
                <a class="btn btn-danger" href="/amend/amend/del?id=<?=$model->id?>">删除</a>
            </div>
        </div>
    </form>
</div>