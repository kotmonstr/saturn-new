<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Reqvizit */

$this->title = 'Редактировать: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Reqvizits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
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
