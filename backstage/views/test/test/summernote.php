<?php $this->registerJsFile('/h+/plugins/summernote/myEdit.js'); ?>
<div style="width: 500px;margin: 100px auto">
    <div class="summernote"></div>
</div>
<button class="a">打印</button>
<script>
    myEdit({
        element: '.summernote',
        uploadImgUrl: '/basis/file/upload',
        removeImgUrl: '/basis/file/delete',
        default:'<p style="text-align: center; "><img src="https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181023113604une1wyk6t.png" data-filename="img" style="width: 25%; float: none;"><br></p>'
    });
    $('.a').click(function () {
        console.log($('.summernote').summernote('code'));
    });
</script>
