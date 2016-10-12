<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\GoodsCategory;
use common\models\GoodsPodCategory;


$this->title = $model->item;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>


    <div class="box-body" style="display: block;">

        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'item',

                [
                    'attribute' => 'price',
                    'format' => 'raw',
                    'value' => $model->price .  ' Руб.'
                ],
                [
                    'attribute' => 'units',
                    'format' => 'raw',
                    'value' => $model->units
                ],
                [
                    'attribute' => 'category_id',
                    'format' => 'raw',
                    'value' => Html::a(GoodsCategory::find()->where(['id' => $model->category_id])->one()->getName(), '/goods-category/view?id=' . $model->category_id)
                ],
                [
                    'attribute' => 'pod_category_id',
                    'format' => 'raw',
                    'value' => isset($model->pod_category_id) ? Html::a(GoodsPodCategory::find()->where(['id' => $model->pod_category_id])->one()->getName(), '/goods-pod-category/view?id=' . $model->pod_category_id) : 'нет'
                ],
                'descr:ntext',

                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => $model->status == 1 ? 'Показан' : 'Спрятан'
                ], [
                    'attribute' => 'pdf',
                    'format' => 'raw',
                    'value' => $model->pdf ? Html::a($model->pdf, '/upload/pdf/' . $model->pdf) : 'нет'
                ],
                [
                    'attribute' => 'image',
                    'value' => isset($model->image) && $model->image != '' ? '/upload/goods/' . $model->image : '/img-custom/no_photo.jpg',
                    'format' => ['image', ['width' => '300', 'height' => '200']],
                ],
            ],
        ]) ?>
    </div>
</div>

