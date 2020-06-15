<?php

use frontend\theme\MainLayout;
use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */

$params = Yii::$app->frontend->mainLayoutParams([
    'user' => Yii::$app->user->identity,
    'content' => $content
]);

echo MainLayout::widget($params);