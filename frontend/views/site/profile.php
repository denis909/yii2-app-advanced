<?php

echo $this->render('/templates/profile', [
    'form' => frontend\widgets\Profile::widget([
        'model' => $model
    ])
]);

$this->params['breadcrumbs'][] = $this->title;