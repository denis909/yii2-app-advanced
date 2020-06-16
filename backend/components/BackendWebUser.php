<?php

namespace backend\components;

use denis909\yii\RootUser;

class BackendWebUser extends \denis909\backend\BackendWebUser
{

    public $identityClass = RootUser::class;

}