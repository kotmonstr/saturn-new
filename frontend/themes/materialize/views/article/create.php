<?php
use yii\helpers\Html;

$this->title = 'Создать Статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!--Begin Datatables-->

                <div class="row">
                    <div class="col-md-12 " style="text-align: center">
                         <h1><?= Html::encode($this->title) ?></h1>
                    </div>
                </div>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</section>

