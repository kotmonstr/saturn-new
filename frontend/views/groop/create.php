<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Groop */

$this->title = 'Создать группу';
$this->params['breadcrumbs'][] = ['label' => 'Groops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
