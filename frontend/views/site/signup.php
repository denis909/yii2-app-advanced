<?php

/* @var $this yii\web\View */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-signup">

<p>Please fill out the following fields to signup:</p>

<?= frontend\widgets\Signup::widget(['model' => $model]);?>

</div>