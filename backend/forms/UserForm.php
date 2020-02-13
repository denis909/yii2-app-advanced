<?php

namespace backend\forms;

use yii\helpers\ArrayHelper;

class UserForm extends \common\models\User
{

    public $password;

    public function rules()
    {
        return ArrayHelper::merge(
            [
                [['status'], 'default', 'value' => static::STATUS_ACTIVE]
            ],
            parent::rules(), 
            [
                [['username', 'email', 'status'], 'required'],
                [['password'], 'string', 'min' => 5, 'max' => 255]
            ]
        );
    }

    public function beforeSave($insert)
    {
        if ($this->password)
        {
            $this->setPassword($this->password);
        }

        if ($insert)
        {
            $this->generateAuthKey();

            $this->generateEmailVerificationToken();
        }

        return parent::beforeSave($insert);
    }

    public function getStatusList()
    {
        return static::statusList();
    }

}