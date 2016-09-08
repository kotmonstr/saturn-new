<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\GoodsCategory;
use frontend\assets\AdminAsset;
use common\models\GoodsPodCategory;
use yii\helpers\Url;



$this->registerJsFile('/js/upload_goods.js', ['depends' => AdminAsset::className()]);
$this->registerJsFile('/js/switch-goods.js', ['depends' => AdminAsset::className()]);


$arrGoodsCategory = GoodsCategory::find()->all();
$arrGoodsPodCategory = GoodsPodCategory::find()->all();

?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                 <div class="row">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'form-send-file']); ?>
                    <?= $form->field($model, 'id',['options' => ['class' => 'hidden']])->textInput(['maxlength' => 255]) ?>

                    <?= $form->field($model, 'item',['options' => ['class' => 'col-md-8']])->textInput(['maxlength' => 255]) ?>
                    <?= $form->field($model, 'currency',['options' => ['class' => 'col-md-2']])->dropDownList([1 => 'RUB',2 => 'EUR', 3 => 'USD']) ?>
                    <?= $form->field($model, 'price',['options' => ['class' => 'col-md-2']])->textInput() ?>
                </div>
                <div class="row">
                    <?= $form->field($model, 'category_id',['options' => ['class' => 'col-md-6']])->dropDownList(ArrayHelper::map($arrGoodsCategory, 'id', 'name'), ['onchange' => 'jQuery.post("' . Url::toRoute('/site/get-pod-cats-by-category') . '", {id: jQuery(this).val()}, function(res){jQuery("#goods-pod_category_id").html(res);});'])->label('Категория товара ' . Html::a(' Создать', '/goods-category/create', ['class' => 'btn btn-primary'])) ?>
                    <?= $form->field($model, 'pod_category_id',['options' => ['class' => 'col-md-6']])->dropDownList(ArrayHelper::map($arrGoodsPodCategory, 'id', 'name'))->label('Подкатегория ' . Html::a(' Создать', '/goods-pod-category/create', ['class' => 'btn btn-primary'])) ?>
                </div>

                <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>


                <?php if ($model->status == 1) {
                    echo $form->field($model, 'status')->checkbox(['class' => 'act'])->label('');
                } else {
                    echo $form->field($model, 'status')->checkbox(['class' => 'non-act'])->label('');
                } ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $model->pdf ? $model->pdf : 'Выберите файл в формате Pdf'; ?>
                        <?= $form->field($model, 'file')->fileInput()->label('Pdf file') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $model->image != '' ? Html::img('/upload/goods/' . $model->image, ['width' => '200px', 'height' => '200px', 'class' => 'target_image']) : Html::img('/images/no_photo.png', ['width' => '200px', 'height' => '200px', 'class' => 'target_image']); ?>

                        <?= $form->field($model, 'image_file')->fileInput(['class' => 'send-file', 'onchange' => 'sendfile()'])->label('Картинка') ?>
                        <?//= $form->field($model, 'image_file_extra[]')->fileInput(['class' => 'hidden', 'onchange' => 'uploadExtraImage(' . $model->id . ')', 'multiple' => true])->label('') ?>

                        <?php if (!$model->isNewRecord) { ?>
                            <?= Html::Button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Добавить фото', ['class' => 'btn', 'onclick' => '$("#goods-image_file_extra").click()']) ?>
                        <?php } ?>
                        <div style="width:700px;display: none">
                            <?= $form->field($model, 'new_image')->hiddenInput(['class' => 'new_image', 'value' => $model->image])->label('') ?>
                        </div>
                    </div>
                </div>


                <div class="form-group" style="">
                    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>


<style>
    .del-image {
        width: 49px;
        height: 100%;
        border: 1px solid red;
        display: inline;
        padding: 10px;
        margin-right: 10px;
        cursor: pointer;
        background-color: red;
        color: #fff;
    }

    .del-image:hover {
        background-color: #ec4844;
    }
</style>