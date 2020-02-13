<?php

use yii\helpers\ArrayHelper;

$userComponent = Yii::$app->controller->userComponent;

$user = Yii::$app->{$userComponent}->identity;

$theme = Yii::$app->backendTheme;

echo $theme->mainLayout([
    'copyright' => false,
    'optionsMenu' => Yii::$app->params['backendOptionsMenu'] ?? [],
    'content' => $content,
    'breadcrumbs' => $this->params['breadcrumbs'] ?? [],
    'user' => $user,
    'infoMessages' => Yii::$app->session->getFlash('info'),
    'successMessages' => Yii::$app->session->getFlash('success'),
    'errorMessages' => Yii::$app->session->getFlash('error'),
    'actionMenu' => ArrayHelper::getValue($this->params, 'actionMenu', []),
    'mainMenu' => ArrayHelper::getValue(Yii::$app->params, 'backendMenu'),
    'enableCard' => ArrayHelper::getValue($this->params, 'enableCard'),
    'cardTitle' => ArrayHelper::getValue($this->params, 'cardTitle'),        
]);