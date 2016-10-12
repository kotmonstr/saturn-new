<?php
$i=0;
?>
<!-- Homepage Slider -->
<div class="homepage-slider">

    <div id="sequence">
        <ul class="sequence-canvas">

            <? if(isset($model)) : ?>
            <? foreach ($model as $slide): ?>
                    <? $i++ ; ?>

            <li class="bg4">
                <!-- Slide Title -->
                <h2 class="title">Responsive<?= $i; ?></h2>
                <!-- Slide Text -->
                <h3 class="subtitle">It looks great on desktops, laptops, tablets and smartphones</h3>
                <!-- Slide Image -->
                <img class="slide-img" src="/PURPOSE/img/homepage-slider/slide1.png" alt="Slide 1" />
            </li>

            <? endforeach; ?>
            <? endif; ?>

        </ul>
        <div class="sequence-pagination-wrapper">
            <ul class="sequence-pagination">
                <li>1</li>
                <li>2</li>
                <li>3</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Homepage Slider -->