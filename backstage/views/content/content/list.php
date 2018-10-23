<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    标识: <input class="searchField" type="text" value="" name="no">
                </span>
                <span class="tableSpan">
                    修改用户: <input class="searchField" type="text" value="" name="user" >
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/content/content/add">添加</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>标识</th>
                <th>备注</th>
                <th>修改用户</th>
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
        url: '/content/content/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "no"},
            {"data": "note"},
            {"data": "username"},
            {"data": "created_at"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/content/content/edit?id=' + data + '">修改</a>';
                return str;
            }
            }
        ],
        default_order: [5, 'asc']
    });
    myTable.search();
</script>