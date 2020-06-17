<?php

echo $this->render('/templates/resendVerificationEmail', [
    'form' => frontend\widgets\ResendVerificationEmail::widget([
        'model' => $model
    ])
]);

$this->params['breadcrumbs'][] = $this->title;