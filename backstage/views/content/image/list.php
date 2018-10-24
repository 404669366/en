<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    备注: <input class="searchField" type="text" value="" name="remark">
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/content/image/add">添加</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>备注</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/content/image/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "remark"},
            {"data": "sort"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/content/image/edit?id=' + data + '">修改</a>&emsp;';
                str += '<a class="btn btn-sm btn-danger" href="/content/image/del?id=' + data + '">删除</a>';
                return str;
            }
            }
        ],
        default_order: [2, 'asc']
    });
    myTable.search();
</script>