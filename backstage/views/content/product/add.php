<?php $this->registerJsFile('/h+/plugins/summernote/myEdit.js'); ?>
<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" class="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">产品名称</label>
            <div class="col-sm-2">
                <input type="text" class="form-control name" value="">
            </div>
        </div>


        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">产品介绍</label>
            <div class="col-sm-10">
                <div class="summernote"></div>
            </div>
        </div>
        <script>
            myEdit({
                element: '.summernote',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete'
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">产品图片</label>
            <div class="col-sm-8">
                <div class="a"></div>
            </div>
        </div>
        <script>
            upload({
                max: 1,
                name: 'image',
                height: 16,
                element: '.a',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete'
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">排序</label>
            <div class="col-sm-2">
                <input type="text" class="form-control sort" value="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary up" type="button">保存内容</button>
                <button class="btn btn-white back">返回</button>
            </div>
        </div>
        <script>
            $(".up").click(function () {
                var data = {
                    _csrf: $('._csrf').val(),
                    name: $('.name').val(),
                    image: $('[name="image"]').val(),
                    intro: $('.summernote').summernote('code'),
                    sort: $('.sort').val()
                };
                $.post('/content/product/save', data, function (re) {
                    if (re.type) {
                        window.location.href = '/content/product/list';
                    } else {
                        layer.msg(re.msg);
                    }
                }, "JSON");
            });

        </script>
    </form>
</div>