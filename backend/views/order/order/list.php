<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    订单编号: <input class="searchField" type="text" value="" name="no">
                </span>
                <span class="tableSpan">
                    电桩编号: <input class="searchField" type="text" value="" name="electricize_no">
                </span>
                <span class="tableSpan">
                    订单状态: <select class="searchField" name="status">
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
                <th>订单编号</th>
                <th>用户</th>
                <th>电桩编号</th>
                <th>枪口号</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>总充电量</th>
                <th>充电总金额</th>
                <th>充电总服务费</th>
                <th>状态</th>
                <th>创建时间</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/order/order/data',
        length: 11,
        columns: [
            {"data": "no"},
            {"data": "tel"},
            {"data": "electricize_no"},
            {"data": "gun_no"},
            {"data": "begin_at"},
            {"data": "end_at"},
            {"data": "all_elec"},
            {"data": "all_price"},
            {"data": "all_service"},
            {"data": "status"},
            {"data": "created"},
        ],
        default_order: [0, 'asc']
    });
    myTable.search();
</script>