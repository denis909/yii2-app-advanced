<?php

use frontend\theme\MainLayout;
use yii\helpers\ArrayHelper;
use yii\web\YiiAsset;

YiiAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

$params = Yii::$app->frontend->mainLayoutParams([
    'user' => Yii::$app->user->identity,
    'content' => $content,
    'username' => Yii::$app->user->isGuest ? Yii::t('frontend', 'Account') : Yii::$app->user->identity->username,
    'accountDescription' => Yii::$app->user->isGuest ? Yii::t('frontend', 'Guest') : Yii::$app->user->identity->email,    
    'accountMenu' => [
        [
            'label' => Yii::t('frontend', 'Login'),
            'url' => ['/site/login'],
            'visible' => Yii::$app->user->isGuest
        ],
        [
            'label' => Yii::t('frontend', 'Signup'),
            'url' => ['/site/signup'],
            'visible' => Yii::$app->user->isGuest
        ],
        [
            'label' => Yii::t('frontend', 'Profile'),
            'url' => ['/site/profile'],
            'visible' => !Yii::$app->user->isGuest
        ],
        [
            'label' => Yii::t('frontend', 'Logout'),
            'url' => ['/site/logout'],
            'visible' => !Yii::$app->user->isGuest,
            'linkOptions' => [
                'data-method' => 'POST',
                'data-params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken],
                'data-confirm' => Yii::t('messages', 'Do you really want to logout?')
            ]
        ]
    ]
]);

echo MainLayout::widget($params);