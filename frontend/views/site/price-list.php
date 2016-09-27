<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Прайс листы</h1>
            </div>



        </div>
    </div>
</div>

<div class="container">
      <div class="row" style="min-height: 450px;margin-top: 20px">


            <? if ($model): ?>
                <? foreach ($model as $pdf): ?>


                    <div class="col-md-8 ">
                       <a target="_blank" title="<?= 'Скачать '.$pdf->descr ?>" href="<?= Url::to('/upload/pdf/'.$pdf->file_name) ?>"> <p><?= $pdf->title ?></p></a>
                    </div>

                    <div class="col-md-2 ">
                       <?= Yii::$app->formatter->asDate($pdf->updated_at,'long') ?>
                    </div>

                <? endforeach; ?>
            <? endif; ?>


      </div>
      </div>
