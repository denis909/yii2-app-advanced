<?php

/* @var $this yii\web\View */
/* @var $model common\models\LoginForm */

use frontend\theme\Html;
use frontend\theme\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'login-form']);?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]);?>

<?= $form->field($model, 'password')->passwordInput();?>

<?= $form->field($model, 'rememberMe')->checkbox();?>

<div class="form-group">

<?= Html::submitButton(Yii::t('frontend', 'Login'), ['name' => 'login-button']) ?>

</div>

<?php $form::end();?>