<?php

namespace frontend\widgets;

class ResendVerificationEmail extends \yii\base\Widget
{

    public $model;

    public function run()
    {
        return $this->render('resend-verification-email', [
            'model' => $this->model
        ]);
    }

}