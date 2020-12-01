<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Pelatihan Online',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Jakarta',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'secret',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap'        => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
        'mailer' => [
             'class' => 'yii\swiftmailer\Mailer',
             'useFileTransport' => false,
             'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' => 'ds.popcafe@gmail.com',
                    'password' => 'dspopcafe',
                    'port' => '587',
                    'encryption' => 'tls'
             ],
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
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '/pelatihan/posttest/koreksi-jawaban/<id:[\d]+>/<unique_id:[\w\_\-]+>' => '/posttest/koreksi-jawaban',
                '/detail-pelatihan/<unique_id:[\w\_\-]+>' => 'pelatihan/detail',
                '/posttest/post-answer' => '/posttest/post-answer',
                '/pretest/post-answer' => '/pretest/post-answer',
                'posttest/request-soal/<unique_id:[\w\_\-]+>' => 'posttest/request-soal',
                'posttest/finish' => 'posttest/finish',
                'pretest/finish' => 'pretest/finish',
                'pretest/request-soal/<unique_id:[\w\_\-]+>' => 'pretest/request-soal',
                'posttest/finish/<unique_id:[\w\_\-]+>' => 'posttest/finish',
                'pretest/finish/<unique_id:[\w\_\-]+>' => 'pretest/finish',
                'posttest/<unique_id:[\w\_\-]+>' => 'posttest/index',
                'pretest/<unique_id:[\w\_\-]+>' => 'pretest/index',
                '<controller:[\w\_\-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w\_\-]+>/<action:[\w\_\-]+>/<id:\d+>' => '<controller>/<action>',
                '<controller:[\w\_\-]+>/<action:[\w\_\-]+>' => '<controller>/<action>',
            ),
        ],
        /*
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        */
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
