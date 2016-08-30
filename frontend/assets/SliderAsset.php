<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class SliderAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'PURPOSE/css/bootstrap.min.css',
        'PURPOSE/css/icomoon-social.css"',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800',
        'PURPOSE/css/leaflet.css',
        'PURPOSE/css/main.css',
        'PURPOSE/css/icomoon-social.css',
        //'PURPOSE/css/main-green.css',
        //'PURPOSE/css/main-red.css',
        //'PURPOSE/css/main-grey.css',
        //'PURPOSE/css/main-orange.css',

// slider
        'REVOLUTION/css/settings.css',
        'REVOLUTION/css/layers.css',
        'REVOLUTION/css/navigation.css',
    ];

    public $js = [
        //'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
        //'window.jQuery || document.write(\'<script src="js/jquery-1.9.1.min.js',
        //'PURPOSE/js/bootstrap.min.js',
        //'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js',
        //'PURPOSE/js/jquery.fitvids.js',
        //'PURPOSE/js/jquery.sequence-min.js',
        //'PURPOSE/js/jquery.bxslider.js"',
        //'PURPOSE/js/main-menu.js',
        //'PURPOSE/js/template.js',
//slider
        'REVOLUTION/js/jquery.themepunch.tools.min.js',
        'REVOLUTION/js/jquery.themepunch.revolution.min.js?rev=5.0',

    ];
    public $depends = [

        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}

