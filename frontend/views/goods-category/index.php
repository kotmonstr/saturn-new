<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

$this->title = 'Категории товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('Создать категорию товара', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'name',
                            //'descr:ntext',
                            [
                                'label'=>'Описание',
                                'format'=>'text',
                                'value'=> function($data){
                                    $result = StringHelper::truncate($data->descr,120);
                                    return $result;
                                }

                            ],
                            ['attribute' => 'image', 'format' => 'html', 'value' => function ($dataProvider) {
                                if ($dataProvider->image) {
                                    return Html::img($dataProvider->image_path . $dataProvider->image, ['height' => '100px']);
                                } else {
                                    return '';
                                }
                            }, 'label' => 'Предпросмотр',],
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
</section>