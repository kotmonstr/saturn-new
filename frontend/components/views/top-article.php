<?
use yii\helpers\Url;
use yii\helpers\StringHelper;


?>
<div class="col-sm-6 latest-news">
    <h2>Новинки</h2>

    <? foreach ($model as $article): ?>

        <div class="row">

            <div class="col-sm-12">
                <div class="caption"><a href="page-blog-post-right-sidebar.html"><?= $article->title ?></a></div>
                <div class="date"><?= Yii::$app->formatter->asDate($article->created_at, 'php:F, Y'); ?></div>
                <div class="intro"><?= StringHelper::truncate($article->content, 200) ?><a href="<?= Url::to(['/site/article-detail/', 'id' => $article->id]); ?>"> Подробнее...</a></div>
            </div>
        </div>

    <? endforeach; ?>
</div>




