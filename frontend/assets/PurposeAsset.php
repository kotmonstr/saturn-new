<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class PurposeAsset extends AssetBundle
{
    //public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'PURPOSE/css/bootstrap.min.css',
        'PURPOSE/css/icomoon-social.css"',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800',
        'PURPOSE/css/leaflet.css',
        'PURPOSE/css/main.css',

        /*        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>*/
    ];
    public $js = [
        'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
        'window.jQuery || document.write(\'<script src="js/jquery-1.9.1.min.js',
        'PURPOSE/js/bootstrap.min.js',
        'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js',
        'PURPOSE/js/jquery.fitvids.js',
        'PURPOSE/js/jquery.sequence-min.js',
        'PURPOSE/js/jquery.bxslider.js"',
        'PURPOSE/js/main-menu.js',
        'PURPOSE/js/template.js',


/*        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>*/

    ];
    public $depends = [

        //'yii\web\JqueryAsset',
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',

    ];
}

