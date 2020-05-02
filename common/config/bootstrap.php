<?php

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-censoring/config/bootstrap.php';
require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-backend/config/bootstrap.php';
require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-glide/config/bootstrap.php';
require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-storage/config/bootstrap.php';
require dirname(dirname(__DIR__)) . '/modules/yii2-shop/config/bootstrap.php';

Yii::setAlias('@denis909/themes/porto17', dirname(dirname(__DIR__)) . '/modules/yii2-theme-porto17');
Yii::setAlias('@denis909/themes/tabler', dirname(dirname(__DIR__)) . '/modules/yii2-theme-tabler');