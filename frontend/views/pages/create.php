<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model frontend\models\Pages */
$this->title = 'Создание страницы';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
