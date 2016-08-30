<?php
$i=0;
?>

<!-- START REVOLUTION SLIDER 5.0 -->
<div class="rev_slider_wrapper">
    <div id="slider1" class="rev_slider"  data-version="5.0">
        <ul>
            <? if(isset($model)) : ?>
            <? foreach ($model as $slide): ?>
            <? $i++ ; ?>

            <li data-transition="fade">
                <!-- MAIN IMAGE -->
                <img src="<?= '/upload/multy-big/'.$slide->name ?>"  alt="Slide <?= $i; ?>"  width="1920" height="1280">
                <!-- LAYER NR. 1 -->
                <div class="tp-caption News-Title"
                     data-x="left" data-hoffset="60"
                     data-y="top" data-voffset="450"
                     data-whitespace="normal"
                     data-transform_idle="o:1;"
                     data-transform_in="o:0"
                     data-transform_out="o:0"
                     data-start="500"><?= $slide->text ?></div>
            </li>
                <? endforeach; ?>
            <? endif; ?>

        </ul>
    </div><!-- END REVOLUTION SLIDER -->
</div><!-- END OF SLIDER WRAPPER -->