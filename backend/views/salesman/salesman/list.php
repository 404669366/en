<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    场地人姓名: <input class="searchField" type="text" value="" name="">
                </span>
                <span class="tableSpan">
                    业务员姓名: <input class="searchField" type="text" value="" name="username">
                </span>
                <span class="tableSpan">
                    手机号: <input class="searchField" type="text" value="" name="tel">
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
                <th>ID</th>
                <th>场地人姓名</th>
                <th>场地位置</th>
                <th>场地信息介绍</th>
                <th>审核备注</th>
                <th>场地状态</th>
                <th>创建时间</th>
                <th>更新时间</th>
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
            {"data": "updated"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
            }
            }
        ],
        default_order: [0, 'asc']
    });
    myTable.search();
</script>