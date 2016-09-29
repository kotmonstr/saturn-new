<?
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>
<div class="col-sm-6 featured-news">
    <h2>Топ продаж</h2>

    <? foreach($model as $good): ?>

        <div class="row">
            <div class="col-xs-4"><a href="<?= Url::to(['/site/goods-detail/','slug'=>$good->slug]); ?>"><img src="<?= '/upload/goods/'.$good->image ?>" alt="<?= $good->item ?>" height="170px"></a></div>
            <div class="col-xs-8">
                <div class="caption"><a href="page-blog-post-right-sidebar.html"><?= $good->item ?></a></div>
                <div class="date"><?= Yii::$app->formatter->asDate($good->created_at, 'php:F, Y'); ?></div>
                <div class="intro"><?= StringHelper::truncate($good->descr,100)?><a href="<?= Url::to(['/site/goods-detail/','slug'=>$good->slug]); ?>"> Подробнее...</a></div>
            </div>
        </div>

    <? endforeach; ?>
</div>

