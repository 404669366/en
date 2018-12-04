<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                   投资人电话: <input class="searchField" type="text" value="" name="tel">
                </span>
                <span class="tableSpan">
                    场地编号: <input class="searchField" type="text" value="" name="no">
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
                <th>意向编号</th>
                <th>投资人电话</th>
                <th>场地编号</th>
                <th>预购金额</th>
                <th>分成比例</th>
                <th>意向状态</th>
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
        url: '/audit/fourth/data',
        length: 10,
        columns: [
            {"data": "no"},
            {"data": "tel"},
            {"data": "field_no"},
            {"data": "money"},
            {"data": "ratio"},
            {"data": "status"},
            {"data": "created"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/audit/fourth/detail?id=' + data + '">详情</a>';

                return str;
            }
            }
        ],
        default_order: [6, 'desc']
    });
    myTable.search();
</script>
