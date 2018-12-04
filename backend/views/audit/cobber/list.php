<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    真实姓名: <input class="searchField" type="text" value="" name="name">
                </span>
                <span class="tableSpan">
                    用户电话: <input class="searchField" type="text" value="" name="tel">
                </span>
                <span class="tableSpan">
                    地理位置: <input class="searchField" type="text" value="" name="full_name">
                </span>
                <span class="tableSpan">
                    用户类型: <select class="searchField" name="type">
                                <option value="">----</option>
                        <?php foreach ($type as $k => $v): ?>
                            <option value="<?= $k ?>"><?= $v ?></option>
                        <?php endforeach; ?>
                            </select>
                </span>
                <span class="tableSpan">
                    用户状态: <select class="searchField" name="status">
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
                <th>用户电话</th>
                <th>真实姓名</th>
                <th>地理位置</th>
                <th>联系地址</th>
                <th>用户类型</th>
                <th>用户状态</th>
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
        url: '/audit/cobber/data',
        length: 10,
        columns: [
            {"data": "tel"},
            {"data": "name"},
            {"data": "full_name"},
            {"data": "address"},
            {"data": "type"},
            {"data": "status"},
            {"data": "created"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                return '<a class="btn btn-sm btn-warning" href="/audit/cobber/detail?id=' + data + '">详情</a>';
            }
            }
        ],
        default_order: [6, 'desc']
    });
    myTable.search();
</script>