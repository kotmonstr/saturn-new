<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use vova07\imperavi\Widget;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <!--    --><?//= $form->field($model, 'alias')->textInput(['maxlength' => true,'placeholder'=>'_my_page']) ?>


                    <?= $form->field($model, 'content')->widget(Widget::className(), [
                        'settings' => [
                            'lang' => 'ru',
                            'minHeight' => 400,
                            'pastePlainText' => true,
                            'buttonSource' => true,
                            'focus' => true,
                            'imageUpload' => '/page/upload',
                            'imageManagerJson' => '/page/uploaded',
                            'plugins' => [
                                'clips',
                                'fullscreen',
                                'imagemanager',
                                //'filemanager'
                            ]
                        ]
                    ]) ?>


                    <?= $form->field($model, 'status')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
</section>