<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\helpers\ArrayHelper;

/**
 * Signup form
 */
class SignupForm extends \common\models\User
{

    public $password;

    public function init()
    {
        parent::init();

        $this->setStatusInactive();
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return [
            $this->scenario => [
                'username',
                'email',
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
                [['username', 'email', 'password'], 'required']
            ]
        );
    }

    public function beforeSave($insert)
    {
        $this->setPassword($this->password);

        return parent::beforeSave($insert);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $this]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'password' => Yii::t('user', 'Password')
        ]);
    }

}