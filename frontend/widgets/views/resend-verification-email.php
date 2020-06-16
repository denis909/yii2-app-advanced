<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\ResendVerificationEmailForm */

use frontend\theme\Html;
use frontend\theme\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']);?>

<?= $form->errorSummary($model);?>

<?= $form->field($model, 'email')->textInput(['autofocus' => true]);?>

<div class="form-group">

<?= Html::submitButton(Yii::t('frontend', 'Send'));?>

</div>

<?php $form::end();?>