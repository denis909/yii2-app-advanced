<?php

namespace frontend\widgets;

class Profile extends \yii\base\Widget
{

    public $model;

    public function run()
    {
        return $this->render('profile', [
            'model' => $this->model
        ]);
    }

}