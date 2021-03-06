<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
//use frontend\assets\AppAsset;
/* @var $this \yii\web\View */
/* @var $content string */
//AppAsset::register($this);
$model = new \common\models\ImageSlider;
//$this->registerJsFile('/js/last/jquery.js');
use backend\assets\AppAsset;
$this->registerJsFile('/js/custom/upload.js', ['depends' => AppAsset::className()]);
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="video-categoria-index">
                    <?php
                    $form = ActiveForm::begin([
                        'action' => ['/slider-photo/submit'],
                        'options' => ['enctype' => 'multipart/form-data'],
                        'id' => 'form-send-file']);
                    ?>
                    <?= $form->field($model, 'file')->fileInput(['class' => 'send-file']) ?>
                    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success send-file-submit' : 'btn btn-success send-file-submit']) ?>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>