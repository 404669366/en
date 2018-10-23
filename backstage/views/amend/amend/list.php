<?php $this->registerJsFile('/h+/js/plugins/layer/laydate/laydate.js');?>
<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    用户名: <input class="searchField" type="text" value="" name="name">
                </span>
                <span class="tableSpan">
                    手机号码: <input class="searchField" type="text" value="" name="tel" >
                </span>
                <span class="tableSpan">
                    创建时间: <input class="searchField" type="text" value="" name="created_at" readonly id="created_at" >
                </span>
                <span class="tableSpan">
                    业务类型: <select class="searchField" name="type">
                                <option value="">----</option>
                                <?php foreach ($types as $k => $type): ?>
                                    <option value="<?= $k ?>"><?= $type ?></option>
                                <?php endforeach; ?>
                            </select>
                </span>
                <span class="tableSpan">
                    状态: <select class="searchField" name="status">
                                <option value="">----</option>
                                <?php foreach ($status as $k => $v): ?>
                                    <option value="<?= $k ?>"><?= $v ?></option>
                                <?php endforeach; ?>
                            </select>
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>用户名</th>
                <th>电话号码</th>
                <th>业务类型</th>
                <th>状态</th>
                <th>备注</th>
                <th>创建时间</th>
                <th>联系时间</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/amend/amend/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "name"},
            {"data": "tel"},
            {"data": "type"},
            {"data": "transStatus"},
            {"data": "remark"},
            {"data": "created_at"},
            {"data": "contact_at"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/amend/amend/edit?id=' + data + '">修改</a>';
                return str;
            }
            }
        ],
        default_order: [6, 'desc']
    });
    myTable.search();
    laydate({elem: "#created_at", event: "focus",format: "YYYY-MM-DD"});
</script>