<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\GoodsCategory;
use common\models\GoodsPodCategory;

$this->title = 'Товары';
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
        <div class="table-responsive">


            <p>
                <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                //'options'=>['class'=>'table-bordered table-striped'],
                //'tableOptions' => ['class' => ' '],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    [
                        'attribute' => 'item',
                        'format' => 'html',
                        'value' => function ($dataProvider) {
                            return Html::a($dataProvider->item, '/goods/view?id=' . $dataProvider->id);
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
                    [
                        'attribute' => 'pod_category_id',
                        'format' => 'text',
                        'value' => function ($dataProvider) {
                            $name = GoodsPodCategory::find()->where(['id' => $dataProvider->pod_category_id])->one();
                            return !empty($name['name']) ? $name['name'] : false;

                        }
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'text',
                        'value' => function ($dataProvider) {

                            return $dataProvider->status == 1 ? 'показан' : 'не показан';

                        }
                    ],


                    //'price',
                    [
                        'attribute' => 'price',
                        'format' => 'text',
                        'value' => function ($dataProvider) {

                            return ceil($dataProvider->price) . ' руб.';

                        }
                    ],
                    [
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function ($dataProvider) {
                            if ($dataProvider->image) {
                                return Html::img('/upload/goods/' . $dataProvider->image, ['height' => '50px']);
                            } else {
                                return '';
                            }
                        },
                        //'label' => 'Предпросмотр',
                    ],
                    // 'descr:ntext',
                    // 'status',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>


        </div>
    </div>
</div>

