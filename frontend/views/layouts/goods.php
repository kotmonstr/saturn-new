<?php


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\SliderAsset;
use common\widgets\Alert;
use app\components\SliderWidget;

SliderAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render('parts-frontend/_mainmenu-wrapper'); ?>

<?//= SliderWidget::widget(); ?>
<?//= $this->render('parts-frontend/_homepage-slider'); ?>
        <?= $content ?>
<?= $this->render('parts-frontend/_footer'); ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
    jQuery(document).ready(function() {
        jQuery("#slider1").revolution({
            sliderType:"standard",
            sliderLayout:"auto",
            delay:3000,
            navigation: {
                arrows:{enable:true},
                keyboardNavigation:"on",
                onHoverStop:"on",
            },
            thumbnails: {
                style:"",
                enable:false,
                container:"slider",
                rtl:false,
                width:100,
                height:50,
                min_width:100,
                wrapper_padding:2,
                wrapper_color:"#f5f5f5",
                wrapper_opacity:1,
                tmp:'<span class="tp-thumb-image"></span><span class="tp-thumb-title"></span>',
                visibleAmount:5,
                hide_onmobile:false,
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1200,
                hide_under:0,
                hide_over:9999,
                direction:"horizontal",
                span:false,
                position:"inner",
                space:2,
                h_align:"left",
                v_align:"center",
                h_offset:20,
                v_offset:0
            },
            tabs: {
                style:"",
                enable:false,
                container:"slider",
                rtl:false,
                width:100,
                min_width:100,
                height:50,
                wrapper_padding:10,
                wrapper_color:"#f5f5f5",
                wrapper_opacity:1,
                tmp:'<span class="tp-tab-image"></span>',
                visibleAmount:5,
                hide_onmobile:false,
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1200,
                hide_under:0,
                hide_over:9999,
                direction:"horizontal",
                span:false,
                space:0,
                position:"inner",
                h_align:"left",
                v_align:"center",
                h_offset:20,
                v_offset:0
            },
            gridwidth:1230,
            gridheight:720
        });
    });
</script>