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
                <h1>Галерея</h1>
            </div>
        </div>
    </div>
</div>


<div class="section blog-posts-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <? if (isset($model)): ?>
                    <? foreach ($model as $galerySlide): ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post ">
                                <div class="post-image">
                                    <?= Html::a(Html::img($galerySlide->file_path . $galerySlide->file_name, []), $galerySlide->file_path . $galerySlide->file_name, ['class' => 'fancybox', 'title' => $galerySlide->text, 'rel' => 'fancybox-thumb']) ?>
                                </div>
                                <div>
                                    <?= $galerySlide->text ?>
                                </div>
                            </div>

                        </div>
                    <? endforeach; ?>
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

