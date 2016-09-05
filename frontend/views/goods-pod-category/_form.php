<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\GoodsCategory;
use yii\helpers\ArrayHelper;

$arrGoodsCategory = GoodsCategory::find()->all();

?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($arrGoodsCategory, 'id', 'name'))->label('Выбирите главную категорию ') ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</section>
