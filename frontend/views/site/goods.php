<?
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Товары</h1>
            </div>
        </div>
    </div>
</div>

<!-- Posts List -->
<div class="section blog-posts-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 blog-sidebar">
                <h4>Искать товар</h4>

                <form action="<?= Url::to('/site/goods') ?>" method="GET">
                    <div class="input-group">
                        <input class="form-control input-md" name="item" id="appendedInputButtons" type="text">
								<span class="input-group-btn">
									<button class="btn btn-md" type="submit">Искать</button>
								</span>
                    </div>
                </form>
                <h4>Категории товаров</h4>
                <ul class="recent-posts">
                    <? if($modelGoodsCategory): ?>
                        <? foreach ($modelGoodsCategory as $item): ?>

                            <li><a href="<?= Url::to(['/site/goods','category_id'=>$item->id]) ?>"><?= $item->name ?></a></li>

                        <? endforeach; ?>
                    <? endif; ?>

                </ul>

                <h4>Подкатегории товаров</h4>
                <ul class="blog-categories">
                    <? if($modelGoodsPodCategory): ?>
                        <? foreach ($modelGoodsPodCategory as $item): ?>

                            <li><a href="<?= Url::to(['/site/goods','pod_category_id'=>$item->id]) ?>"><?= $item->name ?></a></li>

                        <? endforeach; ?>
                    <? endif; ?>
                </ul>
            </div>

            <div class="col-md-9">

                <? if (isset($model)): ?>
                    <? foreach ($model as $goods): ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post ">
                                <div class="ribbon-wrapper">
                                    <?
                                    $currTime = $goods->created_at;
                                    $today = time();
                                    $diff = $today - $currTime;

                                    $timeConstant = 1*24*60*60;

                                    ?>


                            <? if($diff <= $timeConstant): ?>
                                    <div class="price-ribbon ribbon-green">New</div>
                            <? endif ?>
                                </div>

                                <div class="post-info">
                                    <div class="post-date">
                                        <div class="date"><?= $goods->price.' руб' ?></div>
                                    </div>

                                </div>


                                <a href="<?= Url::to(['/site/goods-detail/','slug'=>$goods->slug]) ?>"><img src="<?= '/upload/goods/'.$goods->image ?>"
                                                                                 class="post-image"
                                                                                 alt="Post Title"></a>
                                <div class="post-title">
                                    <h3><a href="<?= Url::to(['/site/goods-detail/','slug'=>$goods->slug]) ?>" title="<?= $goods->item ?>"><?= StringHelper::truncate($goods->item,30); ?></a></h3>
                                </div>
                                <div class="post-summary">
                                    <a href="<?= Url::to('/upload/pdf/'.$goods->pdf ) ?>"><p title="Скачать"><?= StringHelper::truncate($goods->pdf,50); ?></p></a>
                                </div>
                                <div class="post-more">
                                    <a href="<?= Url::to(['/site/goods-detail/','slug'=>$goods->slug]) ?>" class="btn btn-small">Открыть</a>
                                </div>
                            </div>
                        </div>

                    <? endforeach; ?>
                <? endif ?>


            </div>
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
        <div class="clearfix"></div>
    </div>
</div>
<!-- End Posts List -->
<style>
    .blog-post{
        height: 355px!important;
    }
    .post-image{
        height: 200px!important;
    }
</style>