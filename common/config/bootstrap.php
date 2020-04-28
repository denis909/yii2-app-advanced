<?php

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-backend/config/bootstrap.php';
require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-glide/config/bootstrap.php';
require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-storage/config/bootstrap.php';
require dirname(dirname(__DIR__)) . '/modules/yii2-shop/config/bootstrap.php';