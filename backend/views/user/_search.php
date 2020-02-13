<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?= $form->field($model, 'password_salt') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'date_birth') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'email_main') ?>

    <?php // echo $form->field($model, 'email_personal') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'status_involve') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'date_last') ?>

    <?php // echo $form->field($model, 'date_join') ?>

    <?php // echo $form->field($model, 'date_leave') ?>

    <?php // echo $form->field($model, 'status_company') ?>

    <?php // echo $form->field($model, 'status_account') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
