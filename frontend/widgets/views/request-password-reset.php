<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\PasswordResetRequestForm */

use frontend\theme\ActiveForm;
use frontend\theme\Html;

?>

<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']);?>

<?= $form->errorSummary($model);?>

<?= $form->field($model, 'email')->textInput(['autofocus' => true]);?>

<div class="form-group">

<?= Html::submitButton(Yii::t('frontend', 'Send'));?>

</div>

<?php $form::end();?>