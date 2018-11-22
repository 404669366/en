<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
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
            <div class="col-sm-2">
                <a class="btn btn-danger" style="margin-right: 1rem">场地数量：<?= $num ?></a>
                <a href="/commissioner/basis/rob" class="btn btn-info">抢单</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>联系电话</th>
                <th>场地位置</th>
                <th>详细地址</th>
                <th>场地状态</th>
                <th>业务员姓名</th>
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
        url: '/commissioner/basis/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "address"},
            {"data": "intro"},
            {"data": "remark"},
            {"data": "status"},
            {"data": "username"},
            {"data": "created"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                return '<a class="btn btn-sm btn-warning" href="/commissioner/basis/detail?id=' + data + '">详情</a>';
            }
            }
        ],
        default_order: [0, 'asc']
    });
    myTable.search();
</script>