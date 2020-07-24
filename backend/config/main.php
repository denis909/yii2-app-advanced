<?php

use denis909\yii\CascadeConfig;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$return = [
    'id' => 'app-backend',
    'name' => 'Backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'language' => 'ru',
    'controllerMap' => [
        'glide' => '\trntv\glide\controllers\GlideController'
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend'
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning']
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'site/login' => 'login',
                'site/logout' => 'logout'
            ]
        ]
    ],
    'params' => $params
];

$return = CascadeConfig::mergeArray('backend.php', $return);

return $return;