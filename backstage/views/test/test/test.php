<?php $this->registerCssFile('/h+/plugins/summernote/summernote.css', ['depends' => 'app\assets\ModelAsset']); ?>
<?php $this->registerJsFile('/h+/plugins/summernote/summernote.js', ['depends' => 'app\assets\ModelAsset']); ?>
<?php $this->registerJsFile('/h+/plugins/summernote/lang/summernote-zh-CN.js', ['depends' => 'app\assets\ModelAsset']); ?>
<?php $this->registerJsFile('/h+/plugins/summernote/myEdit.js', ['depends' => 'app\assets\ModelAsset']); ?>
<div style="width: 700px;height: 400px;margin: 100px auto">
    <div class="summernote"></div>
</div>
<script>
    myEdit({
        element: '.summernote',
        uploadImgUrl: '/basis/file/upload',
        removeImgUrl: '/basis/file/delete',
    });

</script>
