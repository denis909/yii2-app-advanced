<?php

use frontend\theme\Html;

echo $this->render('/templates/signup', [
    'form' => frontend\widgets\Signup::widget([
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