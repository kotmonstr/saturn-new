<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'common\models\settings'
    ],
    'language' => 'ru-RU',
    'charset' => 'utf-8',
    'timeZone' => 'Europe/Moscow',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LckOQcUAAAAAOpv5GS1VRSEI1_tJa2iwtJHTpiz',
            'secret' => '6LckOQcUAAAAALOfigoY4XA3YGeGgi4-sita2vdW',
        ],
//        'assetManager' => [
//            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => null,
//                    'js' => [
//                        'http://code.jquery.com/jquery-3.1.0.js',
//                        'http://code.jquery.com/ui/1.12.0/jquery-ui.js'
//                    ],
//                ],
//            ],
//        ],
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //''=>'site/default/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

            ],
        ],

    ],
    'params' => $params,
];
