<?php
use yii\helpers\Html;
?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $model->item ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <!-- Product Image & Available Colors -->
            <div class="col-sm-6">
                <div class="product-image-large">
                    <img src="<?= '/upload/goods/'.$model->image ?>" alt="Item Name">
                </div>
                <div class="colors">
                    <span class="color-white"></span>
                    <span class="color-black"></span>
                    <span class="color-blue"></span>
                    <span class="color-orange"></span>
                    <span class="color-green"></span>
                </div>
            </div>
            <!-- End Product Image & Available Colors -->
            <!-- Product Summary & Options -->
            <p class="col-sm-6 product-details">
                <h4><?= $model->item ?></h4>
                <div class="price">
                    </span> <?= $model->price.' Руб' ?>
                </div>


            </div>
            <!-- End Product Summary & Options -->

            <!-- Full Description & Specification -->
            <div class="col-sm-12">
                <div class="tabbable">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs product-details-nav">
                        <li class="active"><a href="#tab1" data-toggle="tab">Описание</a></li>
                        <li><a href="#tab2" data-toggle="tab">Подробное описание</a></li>
                    </ul>
                    <!-- Tab Content (Full Description) -->
                    <div class="tab-content product-detail-info">
                        <div class="tab-pane active" id="tab1">
                            <h4>Описание товара</h4>

                                <?= $model->descr; ?>


                        </div>
                        <!-- Tab Content (Specification) -->
                        <div class="tab-pane" id="tab2">
                       <?= Html::a($model->pdf,'/upload/pdf/'.$model->pdf) ?>
                       <?= $model->descr; ?>
                        </div>
                    </div>
                 
                </div>
            </div>
            <!-- End Full Description & Specification -->
        </div>
    </div>
</div>
