<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReqvizitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Реквизиты';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'company_name',
            'country',
            'address',
            'mobile',
            // 'fax',
            // 'email:email',
            // 'schet',
            // 'inn',
            // 'zip_code',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',],
        ],
    ]); ?>

            </div>
        </div>
    </div>
</section>