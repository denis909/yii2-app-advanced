<?php

use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */

$theme = Yii::$app->theme;

echo $theme->mainLayout([
    'content' => $content,
    'breadcrumbs' => ArrayHelper::getValue($this->params, 'breadcrumbs', []),
    'mainMenu' => ArrayHelper::getValue(Yii::$app->params, 'mainMenu', []),
    'cart' => Yii::$app->shop->getCartItems(),
    'cartOptions' => [
        'emptyMessage' => Yii::t('app', 'Cart is empty.'),
        'menu' => [
            [
                'label' => Yii::t('app', 'View Cart'), 
                'url' => ['/shop/cart']
            ]
        ]
    ],
    'actionMenu' => ArrayHelper::getValue($this->params, 'actionMenu', []),
    'userMenu' => !Yii::$app->user->isGuest ? ArrayHelper::getValue(Yii::$app->params, 'memberMenu', []) : [],
]);