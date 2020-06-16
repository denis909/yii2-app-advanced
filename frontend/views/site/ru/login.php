<?php

/* @var $this yii\web\View */

use frontend\theme\Html;

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;

?>
<p>
Если вы забыли пароль вы можете <?= Html::a('сбросить его', ['site/request-password-reset']);?>.
<br>
Не получили проверочное письмо? <?= Html::a('Отправить проверочное письмо', ['site/resend-verification-email']);?>
</p>

<p>Пожалуйста, заполните все поля формы, чтобы авторизоваться на сайте.</p>

<?= frontend\widgets\Login::widget(['model' => $model]);?>