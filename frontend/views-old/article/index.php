<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use common\models\Comment;
use frontend\assets\AppAsset;
use yii\helpers\Html;
Yii::$app->formatter->locale = 'ru-RU';

?>

<div class="container">
    <div class="new-conteiner">
        <div class="row">
            <div class="row">
                <div class="col-md-3">

                    <div class="col-md-12" style="margin-top: 15px">
                        <div class="navbar navbar-inverse " style="min-height: 200px">

                            <div class="navbar-inner" >
                                <h5 style="text-align: center;color: #676061; text-transform: uppercase;" href="javascript:void(0);">Темы</h5>
                            </div>
                            <div style="padding: 10px">

                                <? foreach ($ArticleCategoryModel as $cat): ?>
                                    <a class="dark-link" href="<?= Url::to(['/article/default/index', 'category' => $cat->id]); ?> "><p class="white-p"><?= $cat->name ?> </p></a>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="row">
                        <? if ($model): ?>
                            <?php foreach ($model as $blog): ?>
                                    <div class="col-md-4">
                                 

                                        <a href="<?= Url::toRoute(['/article/list/'.$blog->slug]); ?>">
                                        <div class="thumbnail">
                                            <img class="img-thumb" src="<?= $blog->src . '/' . $blog->image ?>" alt="...">

                                            <div class="caption">
                                                <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
                                            </div>
<!--                                            <div class="link-to-pdf">-->
<!--                                                <h5 class="caption-header">--><?//= Html::a('Maxseal_flex.pdf','/files/Maxseal_flex.pdf') ?><!--</h5>-->
<!--                                            </div>-->
                                            <div class="caption time">
                                                <span class="glyphicon glyphicon-time bold dark-color"
                                                      aria-hidden="true"></span>
                                    <span
                                        class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px"><?= $blog->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? else: ?>
                            <h3>Ничего не найдено</h3>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

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
                    <ul class="pagination">
                        <li class="last"><a
                                href="/article/default/index?page=<?= ceil($pages->totalCount / $pageSize) ?>"
                                data-page="<?= ceil($pages->totalCount / $pageSize) ?>"><?= '...' . ceil($pages->totalCount / $pageSize); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9" style="text-align: center">
                    <h5>Последние</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="row">
                        <? if ($modelLastArticle): ?>
                            <?php foreach ($modelLastArticle as $blog): ?>
                                <div class="col-md-4">


                                        <a href="<?= Url::toRoute(['/article/list/'.$blog->slug]); ?>">
                                        <div class="thumbnail">
                                            <img class="img-thumb" src="<?= $blog->src . '/' . $blog->image ?>"
                                                 alt="...">

                                            <div class="caption">
                                                <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
                                            </div>
                                            <div class="caption time">
                                                <span class="glyphicon glyphicon-time bold dark-color"
                                                      aria-hidden="true"></span>
                                    <span
                                        class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px"><?= $blog->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? else: ?>
                            <h3>Ничего не найдено</h3>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9" style="text-align: center">
                    <h5>Популярные</h5>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="row">
                        <? if ($modeMostWatched): ?>
                            <?php foreach ($modeMostWatched as $blog): ?>
                                <div class="col-md-4">

                                    <a href="<?= Url::toRoute(['/article/list/'.$blog->slug]); ?>">
                                        <div class="thumbnail">
                                            <img class="img-thumb" src="<?= $blog->src . '/' . $blog->image ?>"
                                                 alt="...">

                                            <div class="caption">
                                                <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
                                            </div>
                                            <div class="caption time">
                                                <span class="glyphicon glyphicon-time bold dark-color"
                                                      aria-hidden="true"></span>
                                    <span
                                        class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px"><?= $blog->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? else: ?>
                            <h3>Ничего не найдено</h3>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


