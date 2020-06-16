<?php

/* @var $this yii\web\View */

$this->title = 'Сброс пароля';

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-request-password-reset">

<p>Пожалуйста, заполните все поля формы, чтобы получить ссылку для сброса пароля.</p>

<?= frontend\widgets\RequestPasswordReset::widget(['model' => $model]);?>

</div>