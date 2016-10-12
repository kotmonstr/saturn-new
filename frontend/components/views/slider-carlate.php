<?php
$i = 0;

?>
<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">

            <? if (isset($model)) : ?>
                <? foreach ($model as $slide): ?>

                    <li data-target="#main-slider" data-slide-to="<?= $i; ?>" class="<?= $i == 0 ? 'active' : 'null'; ?>"></li>

                    <? $i++; ?>
                <? endforeach; ?>
            <? endif; ?>

        </ol>
        <div class="carousel-inner">

            <? if (isset($model)) : ?>
                <? $i=0; ?>
                <? foreach ($model as $slide): ?>
                    <? $i++; ?>

                    <div class="item <?= $i == 1 ? 'active' : 'null'; ?>"
                         style="background-image: url(/carlate/images/slider/bg1.jpg)">
                        <div class="container">
                            <div class="row slide-margin">
                                <div class="col-sm-6">
                                    <div class="carousel-content">
                                        <h1 class="animation animated-item-1"><?= $slide->text ?></h1>
                                    </div>
                                </div>

                                <div class="col-sm-6 hidden-xs animation animated-item-4">
                                    <div class="slider-img">
                                        <img src="<?= '/upload/multy-big/' . $slide->name ?>" class="img-responsive">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!--/.item-->

                <? endforeach; ?>
            <? endif; ?>

        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section><!--/#main-slider-->