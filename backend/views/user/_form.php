<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use trntv\filekit\widget\Upload;

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

echo $form->field($model, 'avatar')->widget(Upload::class, [
    'url' => ['upload-avatar'],
    'sortable' => true,
    'maxFileSize' => $model::AVATAR_MAX_SIZE, // 10 MiB
    'acceptFileTypes' => new JsExpression('/(\.|\/)(' . implode('|', $model::AVATAR_FILE_TYPES) . ')$/i'),
    'maxNumberOfFiles' => 50
]);

?>

<div class="form-group">

    <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
    ]) ?>

</div>

<?php $backendTheme->endActiveForm();?>
