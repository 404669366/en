<?php $this->registerJsFile('/h+/js/plugins/datapicker/bootstrap-datepicker.js', ['depends' => 'app\assets\ModelAsset']); ?>
<?php $this->registerCssFile('/h+/css/plugins/datapicker/datepicker3.css', ['depends' => 'app\assets\ModelAsset']); ?>
<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    用户: <input class="searchField" type="text" value="" name="tel">
                </span>
                <span class="tableSpan">
                    充值时间:<input type="text" class="time searchField" name="time" readonly/>
                    <script>
                        $(".time").datepicker({
                            todayBtn: "linked",
                            keyboardNavigation: !1,
                            forceParse: !1,
                            calendarWeeks: !0,
                            autoclose: !0
                        })
                    </script>
                </span>
                <span class="tableSpan">
                    充值来源: <select class="searchField" name="source">
                        <option value="">----</option>
                        <?php foreach ($source as $k => $v): ?>
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
                <th>充值时间</th>
                <th>用户</th>
                <th>余额</th>
                <th>充值金额</th>
                <th>充值来源</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/finance/recharge/data',
        length: 5,
        columns: [
            {"data": "created"},
            {"data": "tel"},
            {"data": "balance"},
            {"data": "money"},
            {"data": "source"},
        ],
        default_order: [0, 'desc']
    });
    myTable.search();
</script>