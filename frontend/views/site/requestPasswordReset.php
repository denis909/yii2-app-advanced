<?php

echo $this->render('/templates/requestPasswordReset', [
    'form' => frontend\widgets\RequestPasswordReset::widget([
        'model' => $model
    ])
]);

$this->params['breadcrumbs'][] = $this->title;