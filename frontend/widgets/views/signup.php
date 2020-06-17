<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\SignupForm */

use frontend\theme\Html;
use frontend\theme\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']);?>

<?= $form->errorSummary($model);?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true])->hint($usernameHint)->error(false);?>

<?= $form->field($model, 'email')->error(false);?>

<?= $form->field($model, 'password')->passwordInput()->hint($passwordHint)->error(false);?>

<div class="form-group">

<?= Html::submitButton(Yii::t('frontend', 'Signup'), ['name' => 'signup-button']);?>

</div>

<?php $form::end();?>
