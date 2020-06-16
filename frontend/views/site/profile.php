<?php

/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Profile');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-profile">

<?= frontend\widgets\Profile::widget(['model' => $model]);?>

</div>