<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    场地人姓名: <input class="searchField" type="text" value="" name="">
                </span>
                <span class="tableSpan">
                    手机号: <input class="searchField" type="text" value="" name="tel">
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
                <th>场地人姓名</th>
                <th>联系电话</th>
                <th>场地位置</th>
                <th>详细地址</th>
                <th>场地状态</th>
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
        url: '/salesman/salesman/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "name"},
            {"data": "address"},
            {"data": "intro"},
            {"data": "remark"},
            {"data": "status"},
            {"data": "created"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/salesman/salesman/eidt?id=' + data + '">修改</a>';

                return str;
            }
            }
        ],
        default_order: [0, 'asc']
    });
    myTable.search();
</script>