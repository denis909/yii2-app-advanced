<?php

$userComponent = Yii::$app->controller->userComponent;

$user = Yii::$app->{$userComponent}->identity;

$theme = Yii::$app->backendTheme;

echo $theme->mainLayout([
    'content' => $content,
    'breadcrumbs' => $this->params['breadcrumbs'] ?? [],
    'user' => $user
]);