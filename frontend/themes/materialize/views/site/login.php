<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Вход</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="basic-login">

                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox()->label('Помнить') ?>


                        <div class="form-group">
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                </div>
            </div>
            <div class="col-sm-7 social-login">
                <p>Вход через ваш Facebook или Twitter</p>
                <div class="social-login-buttons">
                    <a href="#" class="btn-facebook-login">Login with Facebook</a>
                    <a href="#" class="btn-twitter-login">Login with Twitter</a>
                </div>
                <div class="clearfix"></div>
                <div class="not-member">
                    <p>Еще не зарегился? <a href="<?= Url::to('/site/signup'); ?>">Зарегистрироваться здесь</a></p>
                </div>
            </div>
        </div>
    </div>
</div>



