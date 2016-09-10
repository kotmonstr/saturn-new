<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$arrThemes = ['Товары','Услуги','Заказ'];
?>
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Контакты</h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-lg-12">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
</div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <!-- Map -->
                <div id="contact-us-map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=67WOuEMjZVH5_zD6AWCf4ALTdsaM5mea&amp;width=653&amp;height=300&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
                </div>
                <!-- End Map -->
                <!-- Contact Info -->
                <p class="contact-us-details">
                    <b>Address:</b> 123 Fake Street, LN1 2ST, London, United Kingdom<br/>
                    <b>Phone:</b> +44 123 654321<br/>
                    <b>Fax:</b> +44 123 654321<br/>
                    <b>Email:</b> <a href="mailto:getintoutch@yourcompanydomain.com">getintoutch@yourcompanydomain.com</a>
                </p>
                <!-- End Contact Info -->
            </div>
            <div class="col-sm-5">
                <!-- Contact Form -->
                <h3>Отправить нам сообщение</h3>
                <div class="contact-form-wrapper">

                    <?php $form = ActiveForm::begin([

                        'options'=>['class'=>'form-horizontal'],
                        'fieldConfig' => [
                           'template' => '{label}<div class="col-sm-9">{input}</div><div class="col-sm-9">{error}</div>',
                           'labelOptions' => ['class' => 'col-sm-3 control-label'],
                    ],
                    ]); ?>


                    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true,'autofocus' => true])->label('Ваше имя') ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Ваш Email') ?>

                    <?= $form->field($model, 'subject')->dropDownList($arrThemes)->label('Выберите тему') ?>

                    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary pull-right']) ?>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>
        </div>
    </div>
</div>