<?php

/* @var $this yii\web\View */

use frontend\theme\Html;

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;

?>
<p>
If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']);?>.
<br>
Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']);?>
</p>

<p>Please fill out the following fields to login:</p>

<?= frontend\widgets\Login::widget(['model' => $model]);?>