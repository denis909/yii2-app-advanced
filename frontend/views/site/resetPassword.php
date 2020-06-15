<?php

/* @var $this yii\web\View */

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-reset-password">

<p>Please choose your new password:</p>

<?= frontend\widgets\ResetPassword::widget(['model' => $model]);?>

</div>