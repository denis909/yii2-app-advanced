<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$backendTheme = Yii::$app->backendTheme;

?>

<?php $form = $backendTheme->beginActiveForm([
	'enableClientScript' => false,
	'enableClientValidation' => false,
	'enableAjaxValidation' => false
]); ?>

<?= $form->errorSummary($model);?>

<?= $form->field($model, 'username')->textInput(['maxlength' => true]);?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]);?>

<?= $form->field($model, 'status')->dropDownList($model->statusList, ['prompt' => '...']);?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]);?>

<div class="form-group">

    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

</div>

<?php $backendTheme->endActiveForm();?>
