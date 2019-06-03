<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    电桩收费配置名称: <input class="searchField" type="text" value="" name="name">
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/electricize/section-type/add">添加</a>
            </div>

        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>名称</th>
                <th>说明</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/electricize/section-type/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "name"},
            {"data": "intro"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/electricize/section-type/edit?id=' + data + '">修改</a>';
                if (data != 1) {
                    str += '&emsp;<a class="btn btn-sm btn-danger" href="/electricize/section-type/del?id=' + data + '">删除</a>';
                }
                return str;
            }
            }
        ],
        default_order: [0, 'asc']
    });
    myTable.search();
</script>