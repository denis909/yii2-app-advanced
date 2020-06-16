<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

class ProfileForm extends \common\models\User
{

    public $password;

    /**
     * {@inheritdoc}
     */
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
        return ArrayHelper::merge(
            parent::rules(), 
            $this->getPasswordRules('password'),
            [
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if ($this->password)
        {
            $this->setPassword($this->password);
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'password' => Yii::t('user', 'Password')
        ]);
    }

}