<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Config */

$this->title = $model->param;
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'param',
            'value:ntext',
            'default:ntext',
            'label',
            'type',
        ],
    ]) ?>

</div>
</div>
</div>

</section>
