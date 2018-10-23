<?php $this->registerJsFile('/h+/plugins/summernote/myEdit.js'); ?>
<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <input type="hidden" class="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">标识</label>
            <div class="col-sm-2">
                <input type="text" class="form-control no" value="<?= $no ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文本内容</label>
            <div class="col-sm-10">
                <div class="summernote"></div>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">备注</label>
            <div class="col-sm-2">
                <textarea class="form-control note" ></textarea>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary up" type="button">保存内容</button>
                <button class="btn btn-white back">返回</button>
            </div>
        </div>
    </form>
</div>

<script>
    myEdit({
        element: '.summernote',
        uploadImgUrl: '/basis/file/upload',
        removeImgUrl: '/basis/file/delete',
    });

    $(".up").click(function () {
        var data={
            no:$(".no").val(),
            note:$(".note").val(),
            _csrf:$("._csrf").val(),
            content: $('.summernote').summernote('code')
        };
        $.post('/content/content/do',data,function (re) {
            if(re.type){
                window.location.href = '/content/content/list';
            }else {
                layer.msg(re.msg);
            }
        },"JSON");
    });

</script>