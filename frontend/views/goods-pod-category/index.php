<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\GoodsCategory;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подкатегории товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Создать ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name',
            'description:ntext',
              [
                'attribute' => 'category_id',
                'format' => 'text',
                'value' => function ($dataProvider) {
                    $model = GoodsCategory::find()->where(['id' => $dataProvider->category_id])->one();
                    return $model->name;
                }
            ],

            //'slug',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</section>
