<?php

namespace frontend\widgets;

class ResetPassword extends \yii\base\Widget
{

    public $model;

    public function run()
    {
        return $this->render('reset-password', [
            'model' => $this->model
        ]);
    }

}