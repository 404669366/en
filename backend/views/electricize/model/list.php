<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    电桩型号: <input class="searchField" type="text" value="" name="name">
                </span>
                <span class="tableSpan">
                    电桩品牌: <input class="searchField" type="text" value="" name="brand">
                </span>
                <span class="tableSpan">
                    电桩类型: <select class="searchField" name="type">
                                <option value="">----</option>
                        <?php foreach ($type as $k => $v): ?>
                            <option value="<?= $k ?>"><?= $v ?></option>
                        <?php endforeach; ?>
                            </select>
                </span>
                <span class="tableSpan">
                    标准: <select class="searchField" name="standard">
                                <option value="">----</option>
                        <?php foreach ($standard as $k => $v): ?>
                            <option value="<?= $k ?>"><?= $v ?></option>
                        <?php endforeach; ?>
                            </select>
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/electricize/model/add">添加</a>
            </div>

        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>电桩型号</th>
                <th>电桩品牌</th>
                <th>电压</th>
                <th>电流</th>
                <th>功率</th>
                <th>电桩类型</th>
                <th>标准</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/electricize/model/data',
        length: 10,
        columns: [
            {"data": "name"},
            {"data": "brand"},
            {"data": "voltage"},
            {"data": "current"},
            {"data": "power"},
            {"data": "type"},
            {"data": "standard"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/electricize/model/edit?id=' + data + '">修改</a>';
                 str+='&emsp;<a class="btn btn-sm btn-danger" href="/electricize/model/del?id=' + data + '">删除</a>';
                 return str;
            }
            }
        ],
        default_order: [5, 'asc']
    });
    myTable.search();
</script>