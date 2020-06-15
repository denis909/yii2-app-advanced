<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\SignupForm */

use frontend\theme\Html;
use frontend\theme\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']);?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]);?>

<?= $form->field($model, 'email');?>

<?= $form->field($model, 'password')->passwordInput();?>

<div class="form-group">

<?= Html::submitButton(Yii::t('frontend', 'Signup'), ['name' => 'signup-button']);?>

</div>

<?php $form::end();?>
