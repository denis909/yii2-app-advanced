<?php

namespace frontend\widgets;

class RequestPasswordReset extends \yii\base\Widget
{

    public $model;

    public function run()
    {
        return $this->render('request-password-reset', [
            'model' => $this->model
        ]);
    }

}