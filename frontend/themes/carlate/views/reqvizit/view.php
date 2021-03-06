<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Reqvizit */


$this->params['breadcrumbs'][] = ['label' => 'Reqvizits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'company_name',
            'country',
            'address',
            'mobile',
            'fax',
            'email:email',
            'schet',
            'inn',
            'zip_code',
        ],
    ]) ?>
            </div>
        </div>
    </div>
</section>

