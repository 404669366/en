<?php $this->registerJsFile('/upload/upload.js'); ?>
<?php $this->registerJsFile('/h+/plugins/summernote/myEdit.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章标题</label>
            <div class="col-sm-2">
                <input type="text" class="form-control title"  value="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO关键词</label>
            <div class="col-sm-2">
                <input type="text" class="form-control seo_keywords"  value=""  placeholder="突出文章重点的的关键词，25个字内">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO标题</label>
            <div class="col-sm-2">
                <input type="text" class="form-control seo_title"  value="" placeholder="为标题的内容，32个字内">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO内容描述</label>
            <div class="col-sm-2">
                <textarea class="form-control seo_content" placeholder="突出文章中心的内容，100个字内"></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章简介</label>
            <div class="col-sm-2">
                <textarea class="form-control summary"></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">作者</label>
            <div class="col-sm-2">
                <input type="text" class="form-control author"  value="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章来源</label>
            <div class="col-sm-2">
                <input type="text" class="form-control source"  value="">
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
                removeImgUrl: '/basis/file/delete'
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
                removeImgUrl: '/basis/file/delete'
            });
        </script>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">排序</label>
            <div class="col-sm-2">
                <input type="text" class="form-control sort"  value="">
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