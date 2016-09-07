<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AdminAsset;
$this->registerJsFile('/js/upload_goods_category_logo.js', ['depends' => AdminAsset::className()]);
?>

<div class="goods-category-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'form-send-file']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->hiddenInput(['rows' => 6]) ?>

    <?= $model->image != '' ? Html::img('/upload/goods_category/' . $model->image, ['width' => '200px', 'height' => '200px', 'class' => 'target_image']) : Html::img('/images/no_photo.png', ['width' => '200px', 'height' => '200px', 'class' => 'target_image']); ?>

    <?= $form->field($model, 'image_file')->fileInput(['class' => 'send-file', 'onchange' => 'sendfile()'])->label('Логотип') ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>