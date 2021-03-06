<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\assets\GalleryAsset;

$this->registerJsFile('https://www.google.com/recaptcha/api.js',['depends'=>GalleryAsset::className(),'position'=> \yii\web\View::POS_HEAD]);
$arrThemes = ['Товары'=>'Товары','Услуги'=> 'Услуги','Заказ'=>'Заказ'];

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
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=tm1pJFyb_UhoJeLWxcFEGTTX0wHY4emR&amp;width=653&amp;height=300&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>

                </div>
                <!-- End Map -->
                <!-- Contact Info -->
                <p class="contact-us-details">

                    <?= $modelReqvizit->company_name ? '<b>Компания: </b>'. $modelReqvizit->company_name.'<br>' : null ?>
                    <?= $modelReqvizit->zip_code ? '<b>Индекс: </b>'. $modelReqvizit->zip_code .'<br>': null ?>
                    <?= $modelReqvizit->country ? '<b>Страна: </b>'. $modelReqvizit->country .'<br>': null ?>
                    <?= $modelReqvizit->address ? '<b>Адрес: </b>'. $modelReqvizit->address .'<br>': null ?>
                    <?= $modelReqvizit->mobile ? '<b>Телефон: </b>'. $modelReqvizit->mobile .'<br>': null ?>
                    <?= $modelReqvizit->fax ? '<b>Fax: </b>'. $modelReqvizit->fax .'<br>': null ?>
                    <?= $modelReqvizit->email ? '<b>Email: </b><a href="mailto:">'. $modelReqvizit->email .'</a><br>': null ?>
                    <?= $modelReqvizit->schet ? '<b>P/счет: </b>'. $modelReqvizit->schet.'<br>' : null ?>
                    <?= $modelReqvizit->inn ? '<b>ИНН: </b>'. $modelReqvizit->inn .'<br>': null ?>

                </p>
            </div>
            <div class="col-sm-5">
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

                    <?= $form->field($model, 'subject')->textInput()->label('Тема') ?>

                    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className(),['siteKey' => '6LckOQcUAAAAAOpv5GS1VRSEI1_tJa2iwtJHTpiz','widgetOptions' => ['class' => 'pull-right']])->label('') ?>

                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary pull-right']) ?>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

