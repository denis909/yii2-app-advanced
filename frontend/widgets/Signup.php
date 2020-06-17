<?php

namespace frontend\widgets;

class Signup extends \yii\base\Widget
{

    public $model;

    public $usernameHint;

    public $passwordHint;

    public function run()
    {
        return $this->render('signup', [
            'model' => $this->model,
            'usernameHint' => $this->usernameHint,
            'passwordHint' => $this->passwordHint
        ]);
    }

}