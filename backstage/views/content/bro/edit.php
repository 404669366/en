<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">轮播图名称</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" value="<?=$model->name?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">轮播图</label>
            <div class="col-sm-8">
                <div class="aaaaa"></div>
            </div>
        </div>
        <script>
            upload({
                name:'image',
                height:16,
                element:'.aaaaa',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete',
                default:`<?=$model->image?>`;
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">轮播图链接</label>
            <div class="col-sm-2">
                <input type="text" name="link" class="form-control" value="<?=$model->link?>">
            </div>
        </div>
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