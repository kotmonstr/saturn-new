<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shop */
$this->title = 'Создать товар';
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!--Begin Datatables-->

                <div class="row">
                    <div class="col-md-12 " style="text-align: center">
                        <h1><?= Html::encode($this->title) ?></h1>
                    </div>
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</section>

