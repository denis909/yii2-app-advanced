<?php

use yii\helpers\ArrayHelper;
use denis909\shop\models\ShopCategory;

/* @var $this \yii\web\View */
/* @var $content string */

$theme = Yii::$app->theme;

$cartItems = [];

foreach(Yii::$app->cart->getPositions() as $shopItem)
{
    $cartItems[] = [
        'title' => $shopItem->name,
        'url' => $shopItem->frontendUrl,
        'description' => $shopItem->priceAsCurrency,
        'image' => $shopItem->imageThumb(32, 32)
    ];
}

$mainMenu = ShopCategory::getCategoryMenu(ArrayHelper::getValue($this->params, 'shopCategoryMenu', []));

echo $theme->mainLayout([
    'content' => $content,
    'breadcrumbs' => ArrayHelper::getValue($this->params, 'breadcrumbs', []),
    'mainMenu' => $mainMenu,
    'cart' => $cartItems,
    'cartOptions' => [
        'emptyMessage' => Yii::t('shop', 'Cart is empty.'),
        'menu' => [
            [
                'label' => Yii::t('shop', 'View Cart'), 
                'url' => ['/shop/cart']
            ]
        ]
    ],
    'actionMenu' => ArrayHelper::getValue($this->params, 'actionMenu', []),
    'userMenu' => !Yii::$app->user->isGuest ? ArrayHelper::getValue(Yii::$app->params, 'memberMenu', []) : [],
]);