<div class="about-box">
    <h1 style="text-align: center; font-size: 38px"><strong><?= $model->title ?></strong></h1>
    <div style="text-align: center;margin-bottom: 4rem"><strong>作者：<?= $model->author ?>&emsp;&emsp;&emsp;&emsp;&emsp;来源：<?= $model->source ?></strong></div>
    <img src="<?= $model->image ?>" style="margin: 0 auto;display: block;height: 20rem;">
    <div style="width: 60%;margin: 5rem auto 0 auto">
        <?= $model->content ?>
    </div>
</div>
