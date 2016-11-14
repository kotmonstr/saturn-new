<?php
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\AdminAsset;
use backend\assets\AppAsset;
use yii\widgets\ActiveForm;
use common\models\Gallery;
use common\models\PhotoAlbum;
use yii\helpers\ArrayHelper;


$this->registerJsFile('/js/switch-gallery.js', ['depends' => AdminAsset::className()]);
$this->registerJsFile('/js/upload-gallery.js', ['depends' => AppAsset::className()]);

$model = new Gallery();
$arrPhotoAlbum = PhotoAlbum::getAllAlbum();
$items = ArrayHelper::map($arrPhotoAlbum, 'id', 'name');

//vd($arrPhotoAlbum);
$this->title = 'Галерея.';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <h1><?= Html::encode($this->title) ?></h1>


                <?php
                $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data', 'class' => ''],
                    'id' => 'form-send-file',

                ]);
                ?>
                <div class="well">

                    <div class="row">

                            <div class="col-xs-4">
                                <?= $form->field($model, 'album_id')->dropDownList($items, ['class' => 'form-control','prompt'=>'--Select--','onChange' => 'ChangeButton()' ])->label('Имя альбома',['class' => 'control-label']); ?>
                            </div>
                            <div class="col-xs-3">
                                <?= Html::a('Создать новый альбом', '/photo-album/create', ['class' => 'btn btn-default','style'=>'margin-top:27px']) ?>
                            </div>

                    </div>


                    <div class="row">
                        <div class="col-xs-4">

                            <?= $form->field($model, 'file[]')->fileInput(['class' => 'send-file btn btn-warning', 'multiple' => true])->label('Выберите картинки') ?>
                        </div>
                        <div class="col-xs-3">
                            <?= Html::Button('Загрузить', ['class' => 'btn btn-success send-file-submit', 'onclick' => 'sendfile()', 'style' => 'margin-top:27px','disabled'=>'true']) ?>
                        </div>
                    </div>
                </div>


                <?php ActiveForm::end(); ?>


                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        //'album_id',
                        [
                            'attribute' => 'album_id',
                            //'format' => 'row',
                            'value' => function ($dataProvider) {
                                return $dataProvider->photoAlbum->name;
                            },
                            'label' => 'Имя альбома',
                        ],
                        [
                            'attribute' => 'file_name',
                            'format' => 'html',
                            'value' => function ($dataProvider) {
                                return '<img src=' . '/upload/multy-thumbs/' . $dataProvider->file_name . ' height="100px">';
                            },
                            'label' => 'Предпросмотр',
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($dataProvider) {
                                if ($dataProvider->status == 1) {
                                    return '<input type="checkbox" id="' . $dataProvider->id . '"  class="act">';
                                } else {
                                    return '<input type="checkbox" id="' . $dataProvider->id . '" class=non-act>';
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