<?php

/* @var $this yii\web\View */

use frontend\theme\Html;

$content = $this->render('/templates/login', [
    'form' => frontend\widgets\Login::widget([
        'model' => $model,
        'passwordHint' => Yii::t('frontend', 'If you forgot your password you can {link}.', [
            'link' => Html::a(Yii::t('frontend', 'reset it'), ['site/request-password-reset']),
        ]),
        'usernameHint' => Yii::t('frontend', 'Need new verification email? {link}', [
            'link' => Html::a(Yii::t('frontend', 'Resend'), ['site/resend-verification-email'])
        ])
    ])
]);

$this->params['breadcrumbs'][] = $this->title;

echo $content;