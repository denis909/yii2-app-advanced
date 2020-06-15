<?php

/* @var $this yii\web\View */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

<p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>

<?= frontend\widgets\Contact::widget(['model' => $model]);?>

</div>
