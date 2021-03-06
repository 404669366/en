<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    专员: <input class="searchField" type="text" value="" name="username">
                </span>
                <span class="tableSpan">
                    场地编号: <input class="searchField" type="text" value="" name="no">
                </span>
                <span class="tableSpan">
                    场地类型: <select class="searchField" name="status">
                                <option value="">----</option>
                        <?php foreach ($type as $k => $v): ?>
                            <option value="<?= $k ?>"><?= $v ?></option>
                        <?php endforeach; ?>
                            </select>
                </span>
                <span class="tableSpan">
                    场地状态: <select class="searchField" name="status">
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
                <th>场地编号</th>
                <th>专员</th>
                <th>场地电话</th>
                <th>场地位置</th>
                <th>场地状态</th>
                <th>场地类型</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/audit/first/data',
        length: 10,
        columns: [
            {"data": "no"},
            {"data": "username"},
            {"data": "tel2"},
            {"data": "full_name"},
            {"data": "status"},
            {"data": "type"},
            {"data": "created"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                return '<a class="btn btn-sm btn-warning" href="/audit/first/detail?id=' + data + '">详情</a>';
            }
            }
        ],
        default_order: [6, 'desc']
    });
    myTable.search();
</script>
