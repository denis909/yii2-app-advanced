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

<?php

echo $form->errorSummary($model);

echo $form->field($model, 'username')->textInput(['maxlength' => true]);

echo $form->field($model, 'created_at')->datetime([
    'options' => [
        'maxlength' => true, 
        'disabled' => !$model->isAttributeSafe('created_at'),
        'value' => $model->createdAsDatetime
    ]
]);

echo $form->field($model, 'updated_at')->datetime([
    'options' => [
        'maxlength' => true,
        'disabled' => !$model->isAttributeSafe('updated_at'),
        'value' => $model->updatedAsDatetime
    ]
]);

echo $form->field($model, 'email')->textInput(['maxlength' => true]);

echo $form->field($model, 'status')->dropDownList($model->statusList, ['prompt' => '...']);

echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);

?>

<div class="form-group">

    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

</div>

<?php $backendTheme->endActiveForm();?>
