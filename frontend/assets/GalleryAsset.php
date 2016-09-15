<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class GalleryAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'PURPOSE/css/bootstrap.min.css',
        'PURPOSE/css/icomoon-social.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800',
        'PURPOSE/css/leaflet.css',
        'PURPOSE/css/main.css',
        'PURPOSE/css/icomoon-social.css',
        'css/custom.css',
       // 'ui-js/jquery-ui.css',
        //'PURPOSE/css/main-green.css',
        //'PURPOSE/css/main-red.css',
        //'PURPOSE/css/main-grey.css',
        //'PURPOSE/css/main-orange.css',


        'fancybox/source/jquery.fancybox.css?v=2.1.5',
        'fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5',
        'fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7',





    ];

    public $js = [
        'fancybox/lib/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/source/jquery.fancybox.pack.js?v=2.1.5',
        'fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5',
        'fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6',
        'fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7',
        //'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
        //'window.jQuery || document.write(\'<script src="js/jquery-1.9.1.min.js',
        //'PURPOSE/js/bootstrap.min.js',
        //'//http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js',
        'PURPOSE/js/jquery.fitvids.js',
        //'PURPOSE/js/jquery.sequence-min.js',
        //'PURPOSE/js/jquery.bxslider.js',
        //'PURPOSE/js/main-menu.js',
        //'PURPOSE/js/template.js',
        //'ui-js/jquery-ui.js',


    ];
    public $depends = [

        'yii\web\JqueryAsset',
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',

    ];
}

