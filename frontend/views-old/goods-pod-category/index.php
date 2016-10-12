<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\GoodsCategory;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подкатегории товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body" style="display: block;">

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
