<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\ResetPasswordForm */

use frontend\theme\Html;
use frontend\theme\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'profile-form']);?>

<?= $form->errorSummary($model);?>

<?= $form->field($model, 'username')->textInput(['disabled' => true]);?>

<?= $form->field($model, 'email')->textInput(['disabled' => true]);?>

<?= $form->field($model, 'password')->passwordInput(['autofocus' => true]);?>

<div class="form-group">

<?= Html::submitButton(Yii::t('frontend', 'Save'));?>

</div>

<?php $form::end();?>