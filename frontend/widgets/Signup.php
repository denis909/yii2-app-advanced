<?php

namespace frontend\widgets;

class Signup extends \yii\base\Widget
{

    public $model;

    public function run()
    {
        return $this->render('signup', [
            'model' => $this->model
        ]);
    }

}