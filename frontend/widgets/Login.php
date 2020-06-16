<?php

namespace frontend\widgets;

class Login extends \yii\base\Widget
{

    public $model;

    public $passwordHint;

    public $usernameHint;

    public function run()
    {
        return $this->render('login', [
            'model' => $this->model,
            'passwordHint' => $this->passwordHint,
            'usernameHint' => $this->usernameHint
        ]);
    }

}