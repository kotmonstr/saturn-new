<?php
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>
<h2>Новинки</h2>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="products-slider">

                    <? if($model): ?>
                        <? foreach ($model as $good): ?>

                            <div class="shop-item">
                                <!-- Product Image -->
                                <div class="image">
                                    <a href="<?= Url::to(['/site/goods-detail','slug' => $good->slug]); ?>"><img height="250px" src="<?= '/upload/goods/'.$good->image ?>" alt="<?= $good->item ?>"></a>
                                </div>
                                <!-- Product Title -->
                                <div class="title">
                                    <h3><a href="<?= Url::to(['/site/goods-detail','slug' => $good->slug]); ?>"><?= StringHelper::truncate($good->item,100) ?></a></h3>
                                </div>
                                <!-- Product Price -->
                                <div class="price">
                                    <?= $good->price ?> Руб
                                </div>
                                <!-- Buy Button -->
                                <div class="actions">
                                    <a href="<?= Url::to(['/site/goods-detail','slug' => $good->slug]); ?>" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Подробнее</a>
                                </div>
                            </div>

                        <? endforeach; ?>
                    <? endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
