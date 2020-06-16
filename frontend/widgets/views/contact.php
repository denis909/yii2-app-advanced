<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\ContactForm */

use frontend\theme\Html;
use frontend\theme\ActiveForm;
use yii\captcha\Captcha;

?>

<?php $form = ActiveForm::begin(['id' => 'contact-form']);?>

<?= $form->errorSummary($model);?>

<?= $form->field($model, 'name')->textInput(['autofocus' => true]);?>

<?= $form->field($model, 'email');?>

<?= $form->field($model, 'subject');?>

<?= $form->field($model, 'body')->textarea(['rows' => 6]);?>

<?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
]) ?>

<div class="form-group">

<?= Html::submitButton(Yii::t('frontend', 'Submit'), ['name' => 'contact-button']);?>

</div>

<?php $form::end();?>