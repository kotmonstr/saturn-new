<?php
use yii\helpers\Html;
use frontend\assets\GalleryAsset;

GalleryAsset::register($this);

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
<div class="custom-wrapp">
<?= $content ?>
</div>


<?= $this->render('parts-frontend/_footer'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
