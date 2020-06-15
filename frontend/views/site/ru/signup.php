<?php

/* @var $this yii\web\View */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-signup">

<p>Пожалуйста, заполните все поля формы чтобы зарегистрироваться:</p>

<?= frontend\widgets\Signup::widget(['model' => $model]);?>

</div>