<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Мои страницы';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">



                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            //'name',
                            [
                                'attribute' => 'name',
                                'format' => 'html',
                                'value' => function ($dataProvider) {
                                    return Html::a($dataProvider->name,'/page/update?id='.$dataProvider->id);
                                }
                            ],
                            // 'content:ntext',
                            [
                                'attribute' => 'content',
                                //'format' => 'html',
                                'value' => function ($dataProvider) {
                                    return StringHelper::truncate($dataProvider->content,100);
                                }
                            ],
                            //'status',
                            [
                                'attribute' => 'status',
                                'format' => 'html',
                                'value' => function ($dataProvider) {
                                    return $dataProvider->status == 0 ? 'Не опубликаванно' : 'Опубликованно';
                                }
                            ],
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>
                </div>
                </div>
                </section>