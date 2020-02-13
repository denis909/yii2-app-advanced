<?php

use Denis909\CascadeFilesystem\CascadeConfig;

$return = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache'
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

$return = CascadeConfig::mergeConfig('common.php', $return);

return $return;