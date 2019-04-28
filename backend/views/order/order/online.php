<div class="ibox-content">
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>创建时间</th>
                <th>订单编号</th>
                <th>电桩编号</th>
                <th>枪口号</th>
                <th>用户</th>
                <th>当前电量</th>
                <th>充电时长</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>充电电量</th>
                <th>服务费用</th>
                <th>充电费用</th>
                <th>状态</th>
            </tr>
            </thead>
        </table>
    </div>
<script>
    myTable.load({
        table: '#table',
        length: 13,
        url: '/order/order/online-data',
        columns: [
            {"data": "created"},
            {"data": "o"},
            {"data": "no"},
            {"data": "gun"},
            {"data": "user"},
            {"data": "e"},
            {"data": "time"},
            {"data": "begin"},
            {"data": "end"},
            {"data": "ele"},
            {"data": "service"},
            {"data": "electrovalence"},
            {"data": "status"},
        ],
        default_order: [0, 'asc']
    });
    myTable.search();
</script>