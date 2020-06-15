<?php

/* @var $this yii\web\View */

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-request-password-reset">

<p>Please fill out your email. A link to reset password will be sent there.</p>

<?= frontend\widgets\RequestPasswordReset::widget(['model' => $model]);?>

</div>