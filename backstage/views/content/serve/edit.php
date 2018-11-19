<?php $this->registerJsFile('/h+/plugins/summernote/myEdit.js'); ?>
<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" class="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">业务名</label>
            <div class="col-sm-2">
                <input type="text" class="form-control name" value="<?= $model->name ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">业务详情</label>
            <div class="col-sm-10">
                <div class="summernote"></div>
            </div>
        </div>
        <script>
            myEdit({
                element: '.summernote',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete',
                default: `<?=$model->content?>`
            })
            ;
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">业务大图</label>
            <div class="col-sm-8">
                <div class="b"></div>
            </div>
        </div>
        <script>
            upload({
                max: 1,
                name: 'bigImage',
                height: 16,
                element: '.b',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete',
                default: '<?=$model->bigImage?>'
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">排序</label>
            <div class="col-sm-2">
                <input type="text" class="form-control sort" value="<?= $model->sort ?>">
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
                    id: '<?=$model->id?>',
                    name: $('.name').val(),
                    bigImage: $('[name="bigImage"]').val(),
                    content: $('.summernote').summernote('code'),
                    sort: $('.sort').val()
                };
                $.post('/content/serve/save', data, function (re) {
                    if (re.type) {
                        window.location.href = '/content/serve/list';
                    } else {
                        layer.msg(re.msg);
                    }
                }, "JSON");
            });

        </script>
    </form>
</div>