<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shop */
$this->title = 'Создать товар';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>


    <div class="box-body" style="display: block;">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>


