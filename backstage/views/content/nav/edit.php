<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">导航栏名称</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" value="<?=$model->name?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">导航栏路由</label>
            <div class="col-sm-2">
                <input type="text" name="url" class="form-control" value="<?=$model->url?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">背景图</label>
            <div class="col-sm-8">
                <div class="aaaaa"></div>
            </div>
        </div>
        <script>
            upload({
                max:1,
                name:'background',
                height:16,
                element:'.aaaaa',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete',
                default:'<?=$model->background?>'
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">页面标题</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" value="<?=$model->title?>" placeholder="最好不要超过25个字(以 _ 链接)">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">页面关键词</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="keywords" value="<?=$model->keywords?>" placeholder="最好不要超过32个字(以 , 链接)">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">页面描述</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="description" placeholder="最好不要超过100个字(以空格链接)"><?=$model->description?></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">页面刷新时间</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="refresh" value="<?=$model->refresh?>" placeholder="0或不填写页面则不自动刷新">
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