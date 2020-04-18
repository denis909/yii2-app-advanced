<?php

namespace frontend\components;

use common\models\User;

class FrontendWebUser extends \yii\web\User
{

    public $enableAutoLogin = true;

    public $identityCookie = ['name' => '_identity-frontend', 'httpOnly' => true];

    public $identityClass = User::class;

}