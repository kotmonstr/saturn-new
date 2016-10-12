<?php
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\AdminAsset;
use backend\assets\AppAsset;
use yii\widgets\ActiveForm;
use common\models\ImageSlider;

$this->registerJsFile('/js/switch-image.js', ['depends' => AdminAsset::className()]);
$this->registerJsFile('/js/upload-multy.js', ['depends' => AppAsset::className()]);

$model = new ImageSlider();

$this->title = 'Слайдер - мульти загрузка.';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                    <h1><?= Html::encode($this->title) ?></h1>

                <div class="outer">
                    <div class="inner bg-light lter">
                        <div id="collapse4" class="body">
                            <div class="video-categoria-index">
                                <?php
                                $form = ActiveForm::begin([
                                    //'action' => ['/slider-photo/submit'],
                                    'options' => ['enctype' => 'multipart/form-data'],
                                    'id' => 'form-send-file']);
                                ?>
                                <?= $form->field($model, 'file[]')->fileInput(['class' => 'send-file', 'multiple' => true]) ?>
                                <? //= Html::submitButton('Загрузить', ['class' => 'btn btn-success send-file-submit' ]) ?>
                                <?= Html::Button('Загрузить', ['class' => 'btn btn-success send-file-submit', 'onclick' => 'sendfile()']) ?>
                                <?php ActiveForm::end(); ?>

                            </div>
                        </div>
                    </div>
                </div>


                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            //'name',
                            [
                                'attribute' => 'name',
                                'format' => 'html',
                                'value' => function ($dataProvider) {
                                    return '<img src='.'/upload/multy-thumbs/' . $dataProvider->name . ' height="100px">';
                                },
                                'label' => 'Предпросмотр',
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'value' => function ($dataProvider) {
                                    if($dataProvider->status == 0){
                                        return '<input type="checkbox" id="'.$dataProvider->id.'"  class="act">';
                                    }
                                    else{
                                        return '<input type="checkbox" id="'.$dataProvider->id.'" class=non-act>';
                                    }
                                },
                                'label' => 'Активо/ Не активно',
                            ],

                            'text',
                           ['class' => 'yii\grid\ActionColumn'],
                           //['class' => 'yii\grid\ActionColumn','template' => '{delete}'],
                        ],
                    ]);
                    ?>

                </div>
            </div>
        </div>
</section>