<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\GoodsCategory;

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <p>
                        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'item',
                                'format' => 'html',
                                'value'=> function($dataProvider){
                                    return  Html::a($dataProvider->item,'/goods/default/view?id='.$dataProvider->id);
                                }
                            ],
                            [
                                'attribute' => 'category_id',
                                'format' => 'text',
                                   'value' => function ($dataProvider) {
                                    $a = GoodsCategory::find()->where(['id' => $dataProvider->category_id])->one();
                                    $b = $a['name'];
                                    return $b;
                                }
                            ],
                            'quantity',
                            'price',
                            ['attribute' => 'image', 'format' => 'html', 'value' => function ($dataProvider) {
                                if ($dataProvider->image) {
                                    return Html::img('/upload/goods/' . $dataProvider->image, ['height' => '100px']);
                                } else {
                                    return '';
                                }
                            }, 'label' => 'Предпросмотр',],
                            // 'descr:ntext',
                            // 'status',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>

</section>