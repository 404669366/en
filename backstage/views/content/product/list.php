<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    产品名称: <input class="searchField" type="text" value="" name="name">
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/content/product/add">添加</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>产品名称</th>
                <th>价格</th>
                <th>功率</th>
                <th>分段</th>
                <th>电损</th>
                <th>利用率</th>
                <th>参考服务费</th>
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
        url: '/content/product/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "name"},
            {"data": "price"},
            {"data": "power"},
            {"data": "para"},
            {"data": "electric_loss"},
            {"data": "availability"},
            {"data": "electrovalency"},
            {"data": "sort"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/content/product/edit?id=' + data + '">修改</a>&emsp;';
                str += '<a class="btn btn-sm btn-danger" href="/content/product/del?id=' + data + '">删除</a>';
                return str;
            }
            }
        ],
        default_order: [2, 'asc']
    });
    myTable.search();
</script>