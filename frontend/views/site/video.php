<?
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\GalleryAsset;

$this->registerJsFile('/js/fancy-init.js', ['depends' => GalleryAsset::className()]);

?>

<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Видео</h1>
            </div>
        </div>
    </div>
</div>


<div class="section blog-posts-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <? if (!empty($model)): ?>
                    <? foreach ($model as $youtube): ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post ">
                                <div class="post-image">
                                    <iframe class="fancybox" width="100%" height="100%" src="https://www.youtube.com/embed/<?= $youtube->youtube_id ?>" frameborder="0" allowfullscreen></iframe>

                                </div>
                                <div>
                                    <?= $youtube->title ?>
                                </div>
                            </div>

                        </div>
                    <? endforeach; ?>


                <? else: ?>

                    <div class="col-md-4 col-md-offset-5" >
                        <p>Список пуст.</p>
                    </div>

                <? endif ?>

            </div>
        </div>
    </div>
</div>



<style>
    .blog-post {
    / / height: 155 px !important;
    }

    .post-image {
    / / height: 200 px !important;
    }

    .cateegory-main {
        cursor: pointer;
    }

    .cateegory-main:focus {
        outline: none;
    }

    .pod-category {
        margin-left: 20px;
        cursor: pointer;
    }

    .pod-category:first-child {
        border-top: none !important
    }

    .recent-posts {
    / / height: 10 px;
    }

    .good-price {
        font-weight: bold;
        font-size: 14px;
        padding: 5px;
    }

    h5 a {
        color: #53555c;
    !important;
    }
</style>

