<?php
use yii\helpers\StringHelper;
use yii\helpers\Url;
use app\components\TopGoodsWidget;
use app\components\TopArticleWidget;
?>

<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Мы лидирующая компания!</h3>
                <p>
                    Donec elementum mi vitae enim fermentum lobortis. In hac habitasse platea dictumst. Ut pellentesque, orci sed mattis consequat, libero ante lacinia arcu, ac porta lacus urna in lorem. Praesent consectetur tristique augue, eget elementum diam suscipit id.
                </p>
                <h3>Широкий спектр работ и услуг</h3>
                <p>
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam condimentum laoreet sagittis. Duis quis ullamcorper leo. Suspendisse potenti.
                </p>
            </div>
            <div class="col-md-6">
                <div class="video-wrapper">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/bATB9PZEA1o" frameborder="0" allowfullscreen></iframe>
                    <!-- <iframe src="http://player.vimeo.com/video/47000322?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <h2>Наши работы</h2>
        <div class="row">

            <? if($modelMyWorks): ?>
            <? foreach ($modelMyWorks as $work): ?>


            <div class="col-md-4 col-sm-6">
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <a href="<?= Url::to(['/site/article-detail','id'=>$work->id]) ?>"><img src="/upload/article/<?= $work->image ?>" alt="Project Name"></a>
                    </div>
                    <div class="portfolio-info">
                        <ul>
                            <li class="portfolio-project-name"><?= StringHelper::truncate($work->title,70) ?></li>
                      

                            <li class="read-more"><a href="<?= Url::to(['/site/article-detail','id'=>$work->id]) ?>" class="btn">Подробнее</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <? endforeach; ?>
            <?endif; ?>



        </div>
    </div>
</div>
<div class="section" style="">
    <div class="container">
        <div class="row">
           <?= TopGoodsWidget::widget(); ?>
           <?= TopArticleWidget::widget(); ?>
        </div>
    </div>
</div>