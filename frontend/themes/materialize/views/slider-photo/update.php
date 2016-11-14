<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ImageSlider */

$this->title = 'Редактировать слайд: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Image Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</section>