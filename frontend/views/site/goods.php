<?
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\GoodsPodCategory;
use yii\widgets\Breadcrumbs;

$i=0;
?>
<input id="pod_id" type="hidden" value="<?= $cat; ?> ">
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
            <div class="col-sm-12">
               <? echo Breadcrumbs::widget([
                //'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                'links' => [
                                [
                                    'label' => 'Товары',
                                    'url' => ['/site/goods'],
                                    'template' => "<li><b>{link}</b></li>\n", // template for this link only
                                ],
                                [
                                    'label' => $cat_name ? $cat_name : false,
                                    'url' => ['/site/goods', 'cat' => $cat,'cat_name'=> $cat_name],
                                    'template' => $cat_name ? "<li title='Категория'><b>{link}</b></li>\n" : false, // template for this link only
                                ],
                                [
                                    'label' => $pod_cat_name ? $pod_cat_name : false ,
                                    'template' => $pod_cat_name  ? "<li title='Под категория'><b>{link}</b></li>\n" : false, // template for this link only

                                ],

                ]]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 blog-sidebar">
                <h4>Искать товар</h4>

                <form action="<?= Url::to('/site/goods') ?>" method="GET">
                    <div class="input-group" style="margin-bottom: 10px">
                        <input class="form-control input-md" name="item" id="appendedInputButtons" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-md" type="submit">Искать</button>
                            </span>
                    </div>
                </form>


                <? if ($modelGoodsCategory): ?>
                    <a href="<?= Url::to('/site/goods') ?>"><h4 class="cateegory-main" >Все товары</h4></a>

                    <div id="accordion">

                        <? foreach ($modelGoodsCategory as $item): ?>
                            <h4 class="cateegory-main secnd-tab" title="Категория"><?= Html::img($item->image_path . $item->image, ['height' => '12px']) ?> <?= $item->name ?></h4>
                            <ul class="recent-posts">
                                <?

                                $podCat = GoodsPodCategory::find()
                                ->leftJoin('goods', '`goods`.`pod_category_id` = `goods_pod_category`.`id`')
                                ->where(['=','goods.status', 1])
                                ->AndWhere(['goods_pod_category.category_id' => $item->id])
                                ->with('goods')
                                ->all();
                                ?>

                                    <? if(isset($podCat) && $podCat != ''): ?>
                                        <? foreach ($podCat as $item2): ?>
                                            <li data-id="<?= $item2->id ?>" class="pod-category"><a title="Под категория" href="<?= Url::to(['/site/goods','cat_name'=> $item->name,'pod_category_id'=>$item2->id,'pod_cat_name'=>$item2->name ,'cat'=>$i]) ?>"><?= $item2->name ?></a></li>
                                        <? endforeach; ?>
                                <? endif; ?>
                            </ul>
                            <? $i++; ?>
                        <? endforeach; ?>
                    </div>
                <? endif; ?>
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
                                    $timeConstant = 1 * 24 * 60 * 60;
                                    ?>

                                    <? if ($diff <= $timeConstant): ?>
                                        <div class="price-ribbon ribbon-green">New</div>
                                    <? endif ?>
                                </div>

                                <a href="<?= Url::to(['/site/goods-detail/', 'slug' => $goods->slug]) ?>"><img
                                        src="<?= '/upload/goods/' . $goods->image ?>"
                                        class="post-image"
                                        alt="Post Title"></a>

                                <div class="post-title">
                                    <h5><a href="<?= Url::to(['/site/goods-detail/', 'slug' => $goods->slug]) ?>"
                                           title="<?= $goods->item ?>"><?= StringHelper::truncate($goods->item, 100); ?></a>
                                    </h5>
                                </div>
                                <div class="good-price" style="text-align: center">
                                    <?= $goods->price . ' руб' ?>
                                </div>
                                <div class="post-more">
                                    <a href="<?= Url::to('/upload/pdf/' . $goods->pdf) ?>"
                                       class="btn btn-small">Открыть</a>
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
<!-- End Posts List -->
<style>
    .blog-post {
        height: 355px !important;
    }

    .post-image {
        height: 200px !important;
    }
    .cateegory-main {
        cursor: pointer;
    }

    .cateegory-main:focus {
        outline: none;
    }

    .pod-category {
        margin-left: 40px;
        cursor: pointer;
    }

    .pod-category:first-child {
        border-top: none !important
    }
    .recent-posts{
        //height: 10px;
    }
    .good-price{
        font-weight: bold;
        font-size: 14px;
        padding: 5px;
    }
    h5 a{
        color: #53555c;!important;
    }
    .secnd-tab{
        margin-left: 20px;
    }
</style>

<script>
    jQuery(document).ready(function(){
        var cat= parseInt(jQuery('#pod_id').val());
        jQuery("#accordion").accordion({
            active: cat,
            collapsible: true,
            //heightStyle: "fill",
            //icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" }
        });
    });
</script>