<?php

/* @var $this yii\web\View */

$this->title = 'Сброс пароля';

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-reset-password">

<p>Пожалуйста, введите новый пароль.</p>

<?= frontend\widgets\ResetPassword::widget(['model' => $model]);?>

</div>