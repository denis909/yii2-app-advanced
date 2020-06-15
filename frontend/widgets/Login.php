<?php

namespace frontend\widgets;

class Login extends \yii\base\Widget
{

    public $model;

    public function run()
    {
        return $this->render('login', [
            'model' => $this->model
        ]);
    }

}