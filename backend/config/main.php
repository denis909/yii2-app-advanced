<?php

use Denis909\CascadeFilesystem\CascadeConfig;

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
    'components' => [
        'backendTheme' => [
            'class' => 'denis909\sbadmin2\Theme'
        ],
        'request' => [
            'csrfParam' => '_csrf-backend'
        ],
        'user' => [
            'class' => 'frontend\components\FrontendWebUser'
        ],
        'backendUser' => [
            'class' => 'backend\components\BackendWebUser'
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

$return = CascadeConfig::mergeConfig('backend', $return);

return $return;