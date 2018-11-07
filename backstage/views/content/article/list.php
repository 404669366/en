<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <div class="row tableSearchBox">
            <div class="col-sm-10">
                <span class="tableSpan">
                    标题: <input class="searchField" type="text" value="" name="title">
                </span>
                <span class="tableSpan">
                    作者: <input class="searchField" type="text" value="" name="author">
                </span>
                <span class="tableSpan">
                    <button class="tableSearch">搜索</button>
                    <button class="tableReload">重置</button>
                </span>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-info" href="/content/article/add">添加</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover dataTable" id="table">
            <thead>
            <tr role="row">
                <th>ID</th>
                <th>文章标题</th>
                <th>作者</th>
                <th>文章来源</th>
                <th>排序</th>
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
        url: '/content/article/data',
        length: 10,
        columns: [
            {"data": "id"},
            {"data": "title"},
            {"data": "author"},
            {"data": "source"},
            {"data": "sort"},
            {"data": "created"},
            {"data": "modified"},
            {
                "data": "id", "orderable": false, "render": function (data, type, row) {
                var str = '<a class="btn btn-sm btn-warning" href="/content/article/edit?id=' + data + '">修改</a>&emsp;';
                str += '<a class="btn btn-sm btn-danger" href="/content/article/del?id=' + data + '">删除</a>';
                return str;
            }
            }
        ],
        default_order: [4, 'asc']
    });
    myTable.search();
</script>