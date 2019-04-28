<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    电桩编号: <input class="searchField" type="text" value="" name="no">
                </span>
                <span class="tableSpan">
                    电桩所在区域: <input class="searchField" type="text" value="" name="address">
                </span>
                <span class="tableSpan">
                    电桩类型: <input class="searchField" type="text" value="" name="name">
                </span>

                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/electricize/electricize/info">新连电桩</a>
            </div>

        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>电桩编号</th>
                <th>枪口数量</th>
                <th>电桩名称</th>
                <th>电桩收费配置类型</th>
                <th>电桩所在区域</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/electricize/electricize/data',
        length: 10,
        columns: [
            {"data": "no"},
            {"data": "gunpoint"},
            {"data": "mname"},
            {"data": "name"},
            {"data": "title"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                return '<a class="btn btn-sm btn-warning" href="/electricize/electricize/edit?id=' + data + '">修改</a>';
            }
            }
        ],
        default_order: [0, 'asc']
    });
    myTable.search();
</script>