<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */


require __DIR__ . '/_common.php';

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');

$this->params['cardTitle'] = Yii::t('backend', 'Update');

?>

<?= $this->render('_form', [
    'model' => $model,
]);?>