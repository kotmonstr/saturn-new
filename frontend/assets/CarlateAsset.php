<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class CarlateAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "/carlate/css/bootstrap.min.css",
        "/carlate/css/font-awesome.min.css",
        "/carlate/css/animate.min.css",
        "/carlate/css/prettyPhoto.css",
        "/carlate/css/main.css",
        "/carlate/css/responsive.css",

    ];

    public $js = [
        "carlate/js/jquery.js",
        "carlate/js/bootstrap.min.js",
        "carlate/js/jquery.prettyPhoto.js",
        "carlate/js/jquery.isotope.min.js",
        "carlate/js/main.js",
        "carlate/js/wow.min.js",

        "carlate/js/html5shiv.js" >
        "carlate/js/respond.min.js"

    ];
    public $depends = [

        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}

