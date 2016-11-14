<?php
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>

<section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Наши работы</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <? if ($modelMyWorks): ?>
        <? foreach ($modelMyWorks as $work): ?>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="recent-work-wrap">
                    <img class="img-responsive" src="/upload/article/<?= $work->image ?>" alt="" style="height: 220px">
                    <div class="overlay">
                        <div class="recent-work-inner">
                            <h3><a href="#"><?= StringHelper::truncate($work->title, 23) ?></a> </h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                            <a class="preview" href="<?= Url::to(['/site/article-detail', 'id' => $work->id]) ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                        </div>
                    </div>
                </div>
            </div>

            <? endforeach; ?>
            <? endif; ?>

        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#recent-works-->


