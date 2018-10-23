<?php $this->registerJsFile('/upload/upload.js'); ?>
<div class="box"></div>
<script>
    upload({
        name:'image',
        height:22,
        element:'.box',
        uploadImgUrl: '/basis/file/upload',
        removeImgUrl: '/basis/file/delete',
        default:'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181023112616pjc3Q3mbg.png'
    });
</script>
