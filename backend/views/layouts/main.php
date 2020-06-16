<?php

use yii\web\YiiAsset;
use backend\theme\MainLayout;

YiiAsset::register($this);

echo MainLayout::widget(Yii::$app->backend->mainLayoutParams([
    'content' => $content,
    'user' => Yii::$app->backendUser->identity,
    'mainMenu' => [
        'index' => [
            'url' => ['site/index'],
            'label' => Yii::t('backend', 'Dashboard'),
            'icon' => 'fas fa-fw fa-home'
        ]
    ],
    'accountMenu' => [
        'logout' => [
            'label' => Yii::t('backend', 'Logout'),
            'url' => ['site/logout'],
            'linkOptions' => [
                'data-method' => 'POST',
                'data-confirm' => Yii::t('backend', 'Do you really want to logout?')
            ],
            'icon' => 'fa fa-fw fa-sign-out-alt'
        ]
    ],
    'username' => Yii::$app->backendUser->identity->username,
]));