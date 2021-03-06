<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Password reset form
 */
class ResetPasswordForm extends \common\models\User
{

    public $password;

    public function scenarios()
    {
        return [
            $this->scenario => [
                'password'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge($this->getPasswordRules('password'), [
            ['password', 'required']
        ]);
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function beforeSave($insert)
    {
        $this->setPassword($this->password);

        $this->removePasswordResetToken();

        if ($this->isStatusInactive)
        {
            $this->setStatusActive();
        }

        return parent::beforeSave($insert);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'password' => Yii::t('user', 'Password')
        ]);
    }

}