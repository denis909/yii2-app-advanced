<?php

use denis909\yii\CascadeConfig;

$return = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'user' => [
            'class' => 'frontend\components\FrontendWebUser'
        ],
        'backendUser' => [
            'class' => 'backend\components\BackendWebUser'
        ],
        'formatter' => [
            'timeZone' => 'Europe/Moscow'
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache'
        ],
        'i18n' => [
            'translations' => [ 
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ]
            ]
        ]
    ]
];

$return = CascadeConfig::mergeArray('common.php', $return);

return $return;