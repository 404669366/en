<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">负责片区</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="region" value="<?=$model->region?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">介绍</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="intro" value="<?=$model->intro?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" value="<?=$model->name?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">电话</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="tel" value="<?=$model->tel?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">图片</label>
            <div class="col-sm-8">
                <div class="aaaaa"></div>
            </div>
        </div>
        <script>
            upload({
                max: 1,
                name: 'image',
                height: 16,
                element: '.aaaaa',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete',
                default:`<?=$model->image?>`
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">排序</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="sort" value="<?=$model->sort?>">
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