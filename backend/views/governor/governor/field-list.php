<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    业务员姓名: <input class="searchField" type="text" value="" name="username">
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
                <th>场地编号</th>
                <th>业务员姓名</th>
                <th>场地人姓名</th>
                <th>联系电话</th>
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
        url: '/governor/governor/field-data',
        length: 10,
        columns: [
            {"data": "no"},
            {"data": "username"},
            {"data": "name"},
            {"data": "tel"},
            {"data": "full_name"},
            {"data": "status"},
            {"data": "type"},
            {"data": "created"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/governor/governor/field-detail?id=' + data + '">详情</a>';

                return str;
            }
            }
        ],
        default_order: [0, 'desc']
    });
    myTable.search();
</script>