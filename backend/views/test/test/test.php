<div class="col-md-12">
    <div class="form-group">
        <label class="col-sm-1 control-label">文件域：</label>
        <div class="col-sm-9">
            <input type="text" class="form-control myFile">
        </div>
    </div>
</div>
<script>
    uploadFile({
        element:'.myFile',
        prefix:'F-',
        name:'field',
        default:''
    });
</script>