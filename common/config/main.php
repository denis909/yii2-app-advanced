<?php

use Denis909\CascadeFilesystem\CascadeConfig;

$return = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'uploadedStorage' => [
            'class' => trntv\filekit\Storage::class,
            'baseUrl' => '/uploaded',
            'filesystem' => [
                'class' => common\components\LocalFlysystemBuilder::class,
                'path' => '@frontend/web/uploaded'
            ],
            'as log' => [
                'class' => common\components\FileStorageLogBehavior::class,
                'component' => 'uploadedStorage'
            ]
        ],
        'formatter' => [
            'timeZone' => 'Europe/Moscow'
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache'
        ],
        'i18n' => [
            'translations' => [ 
                '*' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => '@common/messages'
                ]
            ]
        ]
    ]
];

$return = CascadeConfig::mergeConfig('common', $return);

return $return;