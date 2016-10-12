<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Регистрация</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="basic-login">
                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя') ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Регистрировать', ['class' => 'btn btn-primary ', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1 social-login">
                <p>Вы можете использовать  ваш Facebook или Twitter для регистрации</p>
                <div class="social-login-buttons">
                    <a href="#" class="btn-facebook-login">Use Facebook</a>
                    <a href="#" class="btn-twitter-login">Use Twitter</a>
                </div>
            </div>
        </div>
    </div>
</div>



