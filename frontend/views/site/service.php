<?php
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Услуги</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">

        <div class="row">

            <? if($model): ?>
            <? foreach ($model as $work): ?>


            <div class="col-md-4 col-sm-6">
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <a href="<?= Url::to(['/site/article-detail','id'=> $work->id]); ?>"><img src="/upload/article/<?= $work->image ?>" alt="Project Name" style="height: 260px"></a>
                    </div>
                    <div class="portfolio-info">
                        <ul>
                            <li class="portfolio-project-name" title="<?= $work->title ?>"><?= StringHelper::truncate($work->title,23) ?></li>
                            <li class="read-more"><a href="<?= Url::to(['/site/article-detail','id'=> $work->id]); ?>" class="btn">Подробнее</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <? endforeach; ?>
            <?endif; ?>



        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-sm-9" style="text-align: center">
                <?=
                LinkPager::widget([
                    'pagination' => $pages,
                    'maxButtonCount' => 5,
                    'hideOnSinglePage' => true
                ]);
                ?>
  
            </div>
        </div>
    </div>
</div>
