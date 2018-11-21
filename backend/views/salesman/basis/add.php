<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地人姓名</label>
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" name="user_id" value="<?= $data->user_id ?>">
                        <input type="text" name="name" class="form-control" value="<?= $data->name ?>" >
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地位置</label>
                    <div class="col-sm-4">
                        <input type="text"  name="area_id" class="form-control" value="<?= $data->area->full_name ?>">
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">详细地址</label>
                    <div class="col-sm-4">
                        <input type="text" name="address" class="form-control" value="<?= $data->address ?>" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6">

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">场地信息介绍</label>
                    <div class="col-sm-4">
                        <textarea name="intro" class="form-control" ><?=$data->intro?></textarea>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">场地图片</label>
                    <div class="col-sm-8">
                        <div class="aaaaa"></div>
                    </div>
                </div>
                <script>
                    upload({
                        max:8,
                        name:'image',
                        height:16,
                        element:'.aaaaa',
                        uploadImgUrl: '/basis/file/upload',
                        removeImgUrl: '/basis/file/delete'
                    });
                </script>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary ">提交</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>