<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row">
            <div class="col-sm-2 col-sm-offset-10">
                <button type="button" class="btn btn-sm btn-info abandon" data-toggle="modal"
                        data-target="#myModal1">添加
                </button>
                <div class="modal inmodal" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated flipInY">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">&times;</span><span
                                            class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">添加信息</h4>
                            </div>
                            <form action="/budget/univalent/add" method="post">
                                <div class="modal-body row" style="margin: 15px 0;">
                                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">功率最小值</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="min" value="<?=$min?>" readonly>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">功率最大值</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="max">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">范围单价</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="price" placeholder="单位（元/kw）">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭
                                    </button>
                                    <button type="submit" class="btn btn-primary save1">保存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>功率最小值</th>
                <th>功率最大值</th>
                <th>范围单价</th>
                <th>操作</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    myTable.load({
        table: '#table',
        url: '/budget/univalent/data',
        length: 5,
        columns: [
            {"data": "min"},
            {"data": "max"},
            {"data": "price"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                return '<a class="btn btn-sm btn-warning" href="/budget/univalent/del?id=' + data + '">删除</a>';
            }
            }
        ],
        default_order: [0, 'asc']
    });
</script>
