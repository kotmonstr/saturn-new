<?php
use yii\helpers\Url;
?>
<section class="content">
        <div class="row">
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                                <div class="inner">
                                        <h3><?= $this->context->countAllGoods ?></h3>
                                        <p>Товары</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= Url::to('/goods/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                                <div class="inner">
                                        <h3><?= $this->context->countAllGoodsCategory ?></h3>
                                        <p>Категории товара</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= Url::to('/goods-category/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                                <div class="inner">
                                        <h3><?= $this->context->countAllGoodsPodCategory ?></h3>
                                        <p>Подкатегории товара</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= Url::to('/goods-pod-category/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
         </div>

        <div class="row">
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                                <div class="inner">
                                        <h3><?= $this->context->countAllArticles ?></h3>
                                        <p>Статьи</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-document-text"></i>
                                </div>
                                <a href="<?= Url::to('/article/show') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                                <div class="inner">
                                        <h3><?= $this->context->countAllArticleCategory ?></h3>
                                        <p>Категории статьи</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-document-text"></i>
                                </div>
                                <a href="<?= Url::to('/article-category/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
        </div>




        <div class="row">
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                                <div class="inner">
                                        <h3><?= $this->context->countAllSliderFotos ?></h3>
                                        <p>Слайдер</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-image"></i>
                                </div>
                                <a href="<?= Url::to('/slider-photo/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                                <div class="inner">
                                        <h3><?= $this->context->countAllGalleryPhotos  ?></h3>
                                        <p>Галерея</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-images"></i>
                                </div>
                                <a href="<?= Url::to('/gallery/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                                <div class="inner">
                                        <h3><?= $this->context->countAllVideo  ?></h3>
                                        <p>Видео галерея</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-videocamera"></i>
                                </div>
                                <a href="<?= Url::to('/video/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div>
        </div>


        <div class="row">
                <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                                <div class="inner">
                                        <h3><?= $this->context->countAllMessage  ?></h3>
                                        <p>Сообщения</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-email"></i>
                                </div>
                                <a href="<?= Url::to('/message/index') ?>" class="small-box-footer">Подробнее <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div><!-- ./col -->
        </div><!-- /.row -->


</section><!-- /.content -->
