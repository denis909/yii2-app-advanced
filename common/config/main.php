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
        ]
    ]
];

$return = CascadeConfig::mergeConfig('common.php', $return);

return $return;