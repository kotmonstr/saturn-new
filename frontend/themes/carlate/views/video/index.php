<?php
use Madcoda\Youtube;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use Madcoda\Youtube as MadcodaYoutube;


$this->title = 'Видео';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Создать Видео', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'youtube_id',
                        'title',
                        //'descr:ntext',
                        //'created_at',
                        // 'categoria',
                        // 'author_id',
                        // 'slug',
                        [
                            'label' => 'Дата создания',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDate($model->created_at, 'long');
                            }
                        ],
                        [
                            'attribute' => 'Preview image',
                            'format' => 'html',
                            'value' => function ($model) {

                                $youtube = new Youtube(array('key' => 'AIzaSyBU4vsvP20CYdFuibdgTMOaZ10vt7JxV5c'));
                                $video = $youtube->getVideoInfo($model->youtube_id);
                                if (is_object($video)) {
                                    $imageSrc = $video->snippet->thumbnails->medium->url;
                                    return Html::img($imageSrc, ['height' => '50px']);
                                }else{
                                    return 'Отсутствует';
                                }
                            }
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>             </div>
        </div>
    </div>
</section>