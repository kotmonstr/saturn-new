<?php
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;
use common\models\ArticleCategory;

?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Статьи</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 blog-sidebar">
                <h4>Поиск по блогам</h4>
                <form>
                    <div class="input-group">
                        <input class="form-control input-md" id="appendedInputButtons" type="text">
                        <span class="input-group-btn">
									<button class="btn btn-md" type="button">Искать</button>
								</span>
                    </div>
                </form>
                <h4>Последние</h4>
                <ul class="recent-posts">

                    <? if(isset($modelLast)): ?>
                        <? foreach($modelLast as $a): ?>
                            <li><a href="<?= Url::to(['/site/article-detail','id'=> $a->id]) ?>"><?= $a->title ?></a></li>
                        <? endforeach; ?>
                    <? endif; ?>

                </ul>
                <h4>Категории</h4>
                <ul class="blog-categories">
                    <? if(isset($modelCategory)): ?>
                        <? foreach($modelCategory as $b): ?>
                            <?php
                            $result = ArticleCategory::is_CatecoryFull($b->id);

                            ?>
                           <? if(!$result): ?>
                                <li><a href="<?= Url::to(['/site/article','category_id'=> $b->id]) ?>"><?= $b->name ?></a></li>
                           <? endif; ?>
                        <? endforeach; ?>
                    <? endif; ?>
                </ul>
                <h4>Архив</h4>
                <ul>


                    <? if(isset($monthList)): ?>
                        <? foreach($monthList as $c): ?>
                            <li><a href=""><?= $c ?></a></li>
                        <? endforeach; ?>
                    <? endif; ?>

                </ul>
            </div>
            <div class="col-sm-8">

                <? if($model): ?>
                    <? foreach($model as $article): ?>

                        <div class="blog-post blog-single-post">
                            <div class="single-post-title"><a href="<?= Url::to(['/site/article-detail','id'=> $article->id]) ?>"><h3><?= $article->title ?></h3></a></div>
                            <div class="single-post-info">
                                <i class="glyphicon glyphicon-time"></i><?= Yii::$app->formatter->asDate($article->created_at, 'php:F, Y'); ?>
                            </div>
                            <div class="single-post-image">
                                <img src="<?= $article->src ?>/<?= $article->image ?>" alt="Post Title" height="">
                            </div>
                            <div class="single-post-content">
                                <h3><?= $article->title ?></h3>
                                <p><?= StringHelper::truncate($article->content,100) ?></p>
                                <a href="<?= Url::to(['/site/article-detail','id'=> $article->id]) ?>" class="btn btn-primary" >Подробнее</a>

                            </div>
                         </div>

                    <? endforeach; ?>
                <? endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-sm-8" style="text-align: center">
                <div class="pagination-wrapper ">


                    <?=
                    LinkPager::widget([
                        'pagination' => $pages,
                        //'maxButtonCount' => 5,
                        'hideOnSinglePage' => true,

                        'firstPageLabel' => 'Первая',
                        'lastPageLabel' => 'Последняя',
                        'prevPageLabel' => '<',
                        'nextPageLabel' => '>',
                        //'maxButtonCount' => 5,

                        'options' => [
                            //'tag' => 'div',
                            'class' => 'pagination pagination-lg',
                        ],

                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>