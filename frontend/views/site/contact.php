<?php

echo $this->render('/templates/contact', [
    'form' => frontend\widgets\Contact::widget([
        'model' => $model
    ])
]);

$this->params['breadcrumbs'][] = $this->title;