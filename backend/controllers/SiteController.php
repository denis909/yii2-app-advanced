<?php

namespace backend\controllers;

use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends \backend\components\BackendController
{
 
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}