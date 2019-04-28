<style>
    .row > div > .widget:hover {
        background-color: #f8ac59;
        cursor: pointer;
    }
</style>
<div class="ibox-content row">
    <div class="col-sm-2 col-sm-offset-5">
        <div class="input-group">
            <input type="text" class="form-control no" placeholder="电桩编号">
            <span class="input-group-btn">
                <button type="button" class="btn btn-primary search">搜索</button>
            </span>
        </div>
    </div>
    <div class="col-sm-5" style="height: 3rem"></div>
    <?php foreach ($data as $k => $v): $v = json_decode($v, true) ?>
        <div class="col-sm-3">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <h1 class="m-xs no"><?= $k ?></h1>
                    <small><?= date('Y-m-d H:i:s', $v['time']) ?></small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php if (!isset($status)): ?>
        <div class="col-sm-12" style="height: 3rem"></div>
        <div class="col-sm-4 col-sm-offset-4" style="text-align: center">
            <button type="button" class="btn btn-primary up">上一页</button>
            <button type="button" class="btn btn-primary down">下一页</button>
        </div>
    <?php endif; ?>
    <script>
        $(function () {
            $('.search').click(function () {
                var no = $('.no').val();
                window.location.href = "/electricize/electricize/error?no=" + no;
            });
            $('.widget').click(function () {
                var no = $(this).find(".no").text();
                window.location.href = "/electricize/electricize/error-detail?no=" + no;
            });
            $('.up').click(function () {
                var start = <?=$start - 2?>;
                if (start >= 0) {
                    window.location.href = "/electricize/electricize/error?start=" + start;
                } else {
                    window.location.href = "/electricize/electricize/error?start=0";
                }
            });
            $('.down').click(function () {
                var start = <?=$start + 2?>;
                window.location.href = "/electricize/electricize/error?start=" + start;
            });
            <?php if (!$data):?>
            setTimeout(function () {
                window.location.href = "/electricize/electricize/error";
            }, 2000);
            <?php endif;?>
        });
    </script>

</div>