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
        <div class="col-sm-3 blog-sidebar">
            <h4>Поиск по альбомам</h4>
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

                <? if(isset($modelPhotoAlbumLast)): ?>
                    <? foreach($modelPhotoAlbumLast as $a): ?>
                        <li><a href="<?= Url::to(['/site/gallery','slug'=> $a->slug]) ?>"><?= $a->name ?></a></li>
                    <? endforeach; ?>
                <? endif; ?>

            </ul>
            <h4>Альбомы</h4>
            <ul class="blog-categories">
                <? if(isset($modelPhotoAlbum)): ?>
                    <? foreach($modelPhotoAlbum as $b): ?>

                            <li><a href="<?= Url::to(['/site/gallery','slug'=> $b->slug]) ?>"><?= $b->name ?></a></li>

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
        <div class="col-sm-9">

                <? if (!empty($model)): ?>
                    <? foreach ($model as $galerySlide): ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post " style="height: 325px;overflow: hidden">
                                <div class="post-image">
                                    <?= Html::a(Html::img($galerySlide->file_path . $galerySlide->file_name, []), $galerySlide->file_path . $galerySlide->file_name, ['class' => 'fancybox', 'title' => $galerySlide->text, 'rel' => 'fancybox-thumb']) ?>
                                </div>
                                <div class="text-font-lr" style="text-align: center">
                                    <?= StringHelper::truncate($galerySlide->text,60) ?>
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

        <div class="row">
            <div class="col-sm-12" style="text-align: center">
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

    .text-font-lr , .fancybox-title{
        font-size: 20px;
    }
    .blog-post img {
        max-width: none; !important;
    }
    .fancybox img {
        height: 310px; !important;
    }
</style>

