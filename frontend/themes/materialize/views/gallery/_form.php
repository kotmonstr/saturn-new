<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Image */
/* @var $form yii\widgets\ActiveForm */
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="image-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'file_name')->textInput(['maxlength' => 100,'disabled'=> true]) ?>

                    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>