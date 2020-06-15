<?php

namespace frontend\widgets;

class Contact extends \yii\base\Widget
{

    public $model;

    public function run()
    {
        return $this->render('contact', [
            'model' => $this->model
        ]);
    }

}