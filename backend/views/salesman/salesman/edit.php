<div class="ibox-content">
    <form method="post" class="form-horizontal">
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">用户电话号码</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= $model->user->tel ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">地域</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= $model->area->full_name ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">业务员</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"
                       placeholder="<?= $model->member ? $model->member->username : '未接单' ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">场地人姓名</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= $model->name ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">场地位置</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= $model->address ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">场地信息介绍</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= $model->intro ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">审核备注</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= $model->remark ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">场地状态</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= $model->status ?>" readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">创建时间</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= date('Y-m-d H:i:s', $model->created) ?>"
                       readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-sm-2 control-label">更新时间</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="<?= date('Y-m-d H:i:s', $model->updated) ?>"
                       readonly>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-white back">返回</button>
            </div>
        </div>
    </form>
</div>