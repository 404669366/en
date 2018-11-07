<?php $this->registerJsFile('/upload/upload.js'); ?>
<?php $this->registerJsFile('/h+/plugins/summernote/myEdit.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章标题</label>
            <div class="col-sm-2">
                <input type="text" class="form-control title" value="<?= $model->title ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO关键词</label>
            <div class="col-sm-2">
                <input type="text" class="form-control seo_keywords" value="<?= $model->seo_keywords ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO标题</label>
            <div class="col-sm-2">
                <input type="text" class="form-control seo_title" value="<?= $model->seo_title ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO内容描述</label>
            <div class="col-sm-2">
                <textarea class="form-control seo_content"><?= $model->seo_content ?></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章简介</label>
            <div class="col-sm-2">
                <textarea class="form-control summary"><?= $model->summary ?></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">作者</label>
            <div class="col-sm-2">
                <input type="text" class="form-control author" value="<?= $model->author ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章来源</label>
            <div class="col-sm-2">
                <input type="text" class="form-control source" value="<?= $model->source ?>">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

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
                default: `<?= $model->image?>`
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章内容</label>
            <div class="col-sm-10">
                <div class="summernote"></div>
            </div>
        </div>
        <script>
            myEdit({
                element: '.summernote',
                uploadImgUrl: '/basis/file/upload',
                removeImgUrl: '/basis/file/delete',
                default: `<?= $model->content?>`
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
            $(function () {
                $(".up").click(function () {
                    var data = {
                        id:<?=$model->id?>,
                        _csrf: '<?= Yii::$app->request->csrfToken ?>',
                        title: $('.title').val(),
                        seo_keywords: $('.seo_keywords').val(),
                        seo_title: $('.seo_title').val(),
                        seo_content: $('.seo_content').val(),
                        summary: $('.summary').val(),
                        author: $('.author').val(),
                        source: $('.source').val(),
                        image: $('[name="image"]').val(),
                        content: $('.summernote').summernote('code'),
                        sort: $('.sort').val()
                    };
                    $.post('/content/article/save', data, function (re) {
                        if (re.type) {
                            window.location.href = '/content/article/list';
                        } else {
                            layer.msg(re.msg);
                        }
                    }, "JSON");
                });

            });

        </script>
    </form>
</div>