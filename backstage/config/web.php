<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'o7iT5DQyzc2IOZOxtJ9wi40yeCkYLp7',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'Asia/Shanghai',
    //'vendorPath' => __DIR__ . '/../../vendor',
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'layout' => 'model',
    'defaultRoute' => $params['defaultRoute'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'db' => $db,
        'request' => [
            'cookieValidationKey' => '49NWqzW2Gu1_PZ9pzxSkiykoishzMAz9',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '47.99.36.149',
            'password' => 'fi9^BRLHschX%V96',
            'port' => 6379,
            'database' => 0,
        ],
        'user' => [
            'identityClass' => 'vendor\en\EnMemberBase',
            'enableAutoLogin' => true,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
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
