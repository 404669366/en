<?php $this->registerCssFile('/h+/css/plugins/summernote/summernote.css',['depends'=>'app\assets\ModelAsset']); ?>
<?php $this->registerCssFile('/h+/css/plugins/summernote/summernote-bs3.css',['depends'=>'app\assets\ModelAsset']); ?>
<?php $this->registerJsFile('/h+/js/plugins/summernote/summernote.min.js',['depends'=>'app\assets\ModelAsset']); ?>
<?php $this->registerJsFile('/h+/js/plugins/summernote/summernote-zh-CN.js',['depends'=>'app\assets\ModelAsset']); ?>
<div style="width: 600px;height: 400px;margin: 100px auto">
    <div class="summernote"></div>
</div>
<script>
    $(document).ready(function () {
        $(".summernote").summernote({
            lang: "zh-CN",
            height:250,
            minHeight:250,
            maxHeight:250,
            focus:true,
            callbacks:{

            }
        })
    });
</script>
