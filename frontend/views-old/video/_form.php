<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AdminAsset;

$this->registerJsFile('/js/youtube.js', ['depends' => AdminAsset::className()]);
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'youtube_id')->textInput(['maxlength' => true, 'onkeyup' => 'sendYoutubeCode()', 'onchange' => 'sendYoutubeCode()']) ?>
                    </div>
                    <div class="col-md-6 info">
                    </div>
                </div>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'disabled' => true]) ?>

                <?= $form->field($model, 'descr')->textarea(['rows' => 6, 'disabled' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>