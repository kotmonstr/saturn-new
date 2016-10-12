<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
$this->title = 'Редактировать категорию: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Article Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</section>