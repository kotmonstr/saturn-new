<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\GoodsCategory;
use common\models\Groop;
use common\models\Brend;

/* @var $this yii\web\View */
/* @var $model common\models\Shop */
$this->title = $model->item;
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <h1><?= 'Товар: ' . Html::encode($this->title) ?></h1>

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
                        // 'id',
                        'item',
                        'price',
                        //'rating',
                        [
                            'attribute' => 'groop_id',
                            'format' => 'raw',
                            'value' => Html::a(Groop::find()->where(['id' => $model->groop_id])->one()->getName(), '/groop/view?id=' . $model->groop_id)
                        ],
                        [
                            'attribute' => 'category_id',
                            'format' => 'raw',
                            'value' => Html::a(GoodsCategory::find()->where(['id' => $model->category_id])->one()->getName(), '/goods_category/view?id=' . $model->category_id)
                        ],

                        //'quantity',
                        'descr:ntext',
           
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => $model->status == 1 ? 'Показан' : 'Спрятан'
                        ],    [
                            'attribute' => 'pdf',
                            'format' => 'raw',
                            'value' => $model->pdf ? Html::a($model->pdf,'/upload/pdf/'.$model->pdf) : 'не загружен'
                        ],
                        [
                            'attribute' => 'image',
                            'value' => isset($model->image) && $model->image != '' ? '/upload/goods/' . $model->image : '/img-custom/no_photo.jpg',
                            'format' => ['image', ['width' => '300', 'height' => '300']],
                        ],
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</section>
