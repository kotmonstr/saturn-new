<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'param')->textInput(['maxlength' => true,'disabled'=> true]) ?>

    <?= $form->field($model, 'value')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'default')->textInput(['rows' => 6,'disabled'=> true]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true,'disabled'=> true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true,'disabled'=> true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
