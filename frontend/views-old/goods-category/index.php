<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

$this->title = 'Категории товаров';
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
                <?= Html::a('Создать категорию товара', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'name',
                    //'descr:ntext',
                    [
                        'label' => 'Описание',
                        'format' => 'text',
                        'value' => function ($data) {
                            $result = StringHelper::truncate($data->descr, 120);
                            return $result;
                        }

                    ],
                    ['attribute' => 'image', 'format' => 'html', 'value' => function ($dataProvider) {
                        if ($dataProvider->image) {
                            return Html::img($dataProvider->image_path . $dataProvider->image, ['height' => '30px']);
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