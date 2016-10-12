<?php


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use common\widgets\Alert;
use app\components\SliderWidget;
use frontend\assets\CarlateAsset;

CarlateAsset::register($this);

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

    <link rel="shortcut icon" href="/carlate/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/carlate/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/carlate/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/carlate/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/carlate/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">
<?php $this->beginBody() ?>
<?= $this->render('parts-frontend/_header'); ?>
<?= SliderWidget::widget(['theme'=>'carlate']); ?>

        <?= $content ?>



<?= $this->render('parts-frontend/_bottom'); ?>

<?= $this->render('parts-frontend/_footer'); ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

