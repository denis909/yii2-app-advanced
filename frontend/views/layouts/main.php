<?php

use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */

$theme = Yii::$app->theme;

echo $theme->mainLayout([
    'content' => $content,
    'breadcrumbs' => ArrayHelper::getValue($this->params, 'breadcrumbs', []),
    'actionMenu' => ArrayHelper::getValue($this->params, 'actionMenu', [])
]);