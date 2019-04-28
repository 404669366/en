<style>
    .row > div > .widget:hover {
        background-color: #f8ac59;
        cursor: pointer;
    }
</style>
<div class="ibox-content row">
    <div class="col-sm-12" style="text-align: center;font-size: 30px;line-height: 72px">选择电桩</div>
    <?php foreach ($data as $v): ?>
        <div class="col-sm-4">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <h1 class="m-xs no"><?= $v['no'] ?></h1>
                    <h1 class="m-xs num"><?= $v['num'] ?></h1>
                    <small><?= date('Y-m-d H:i:s', time()) ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <h1 class="m-xs no"><?= $v['no'] ?></h1>
                    <h1 class="m-xs num"><?= $v['num'] ?></h1>
                    <small><?= date('Y-m-d H:i:s', time()) ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <h1 class="m-xs no"><?= $v['no'] ?></h1>
                    <h1 class="m-xs num"><?= $v['num'] ?></h1>
                    <small><?= date('Y-m-d H:i:s', time()) ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <h1 class="m-xs no"><?= $v['no'] ?></h1>
                    <h1 class="m-xs num"><?= $v['num'] ?></h1>
                    <small><?= date('Y-m-d H:i:s', time()) ?></small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <script>
        $(function () {
            $('.widget').click(function () {
                var no = $(this).find(".no").text();
                var num = $(this).find(".num").text();
                window.location.href = "/electricize/electricize/add?no=" + no + "&num=" + num;
            });
        });
    </script>

</div>