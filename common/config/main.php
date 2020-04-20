<?php

use Denis909\CascadeFilesystem\CascadeConfig;

$return = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'fileStorage' => [
            'class' => trntv\filekit\Storage::class,
            'baseUrl' => '/source',
            'filesystem' => [
                'class' => common\components\LocalFlysystemBuilder::class,
                'path' => '@frontend/web/source'
            ]
            /*,
            'as log' => [
                'class' => common\behaviors\FileStorageLogBehavior::class,
                'component' => 'fileStorage'
            ]*/
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