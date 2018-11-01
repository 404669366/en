<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    变压器名称: <input class="searchField" type="text" value="" name="name">
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/content/transformer/add">添加</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>变压器名称</th>
                <th>最小值</th>
                <th>最大值</th>
                <th>价格</th>
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
        url: '/content/transformer/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "name"},
            {"data": "min"},
            {"data": "max"},
            {"data": "price"},
            {"data": "sort"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/content/transformer/edit?id=' + data + '">修改</a>&emsp;';
                str += '<a class="btn btn-sm btn-danger" href="/content/transformer/del?id=' + data + '">删除</a>';
                return str;
            }
            }
        ],
        default_order: [5, 'asc']
    });
    myTable.search();
</script>