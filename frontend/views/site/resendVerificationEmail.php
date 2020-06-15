<?php

/* @var $this yii\web\View */

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-resend-verification-email">

<p>Please fill out your email. A verification email will be sent there.</p>

<?= frontend\widgets\ResendVerification::widget(['model' => $model]);?>

</div>
