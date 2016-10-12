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
        'common\models\Settings',
    ],
    'language' => 'ru-RU',
    'charset' => 'utf-8',
    'timeZone' => 'Europe/Moscow',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'htmlLayout' => '@common/mail/layouts/html',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'monstrkot@gmail.com',
                'password' => 'jokers123',
                'port' => '587',
                'encryption' => 'tls',
                'plugins' => [
                    [
                        'class' => 'Swift_Plugins_LoggerPlugin',
                        'constructArgs' => [new Swift_Plugins_Loggers_ArrayLogger],
                    ],
                ],
            ],

        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LckOQcUAAAAAOpv5GS1VRSEI1_tJa2iwtJHTpiz',
            'secret' => '6LckOQcUAAAAALOfigoY4XA3YGeGgi4-sita2vdW',
        ],
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
        'LogerClass'=>[
            'class'=>'app\components\LogerClass'
        ],
        'view' => [
            'theme' => [
                //'pathMap' => ['@app/views' => '@app/themes/saturn/views/'],
                'pathMap' => ['@app/views' => '@app/themes/carlate/views'],
                'baseUrl' => '@web/themes/carlate',
                'basePath' => '@app/themes/carlate',
                //'baseUrl' => '@web/themes/saturn',
                //'basePath' => '@app/themes/saturn',

                'baseUrl' => '@web/themes/carlate',
                'basePath' => '@app/themes/carlate',
            ],
        ],
    ],
    'params' => $params,
];
