<?php

echo $this->render('/templates/resetPassword', [
    'form' => frontend\widgets\ResetPassword::widget([
        'model' => $model
    ])
]);

$this->params['breadcrumbs'][] = $this->title;