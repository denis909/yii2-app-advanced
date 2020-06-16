<?php

/* @var $this yii\web\View */

$this->title = 'Верификация email';

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-resend-verification-email">

<p>Пожалуйста, заполните все поля формы, чтобы получить проверочное письмо.</p>

<?= frontend\widgets\ResendVerificationEmail::widget(['model' => $model]);?>

</div>
