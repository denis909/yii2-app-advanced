<?php

namespace backend\forms;

use yii\helpers\ArrayHelper;

class UserForm extends \common\models\User
{

    public $password;

    protected $unsafeAttributes = ['updated_at'];

    public function init()
    {
        parent::init();

        $this->status = static::STATUS_ACTIVE;
    }

    public function scenarios()
    {
        $return = parent::scenarios();

        if (array_key_exists($this->scenario, $return))
        {
            foreach($this->unsafeAttributes as $attribute)
            {
                $index = array_search($attribute, $return[$this->scenario]);

                if ($index)
                {
                    unset($return[$this->scenario][$index]);
                }
            }
        }

        return $return;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['username', 'email', 'status'], 'required'],
            [['password'], 'string', 'min' => 5, 'max' => 255],
            [
                'password', 
                'required', 
                'when' => function($model) {
                    return $model->isNewRecord;
                },
                'enableClientValidation' => false
            ],
            [
                'created_at',
                'required',
                'when' => function($model) {
                    return !$model->isNewRecord;
                },
                'enableClientValidation' => false                
            ]
        ]);
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

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => \yii\behaviors\AttributeTypecastBehavior::class,
                'typecastAfterValidate' => false,
                'typecastBeforeSave' => false,
                'typecastAfterSave' => false,
                'typecastAfterFind' => false,
                'attributeTypes' => [
                    'created_at' => function ($value) {
                        return !is_numeric($value) ? (string) strtotime($value): $value;
                    },
                    'updated_at' => function ($value) {
                        return !is_numeric($value) ? (string) strtotime($value): $value;
                    }
                ]
            ]
        ]);
    }

    public function beforeValidate()
    {
        $this->typecastAttributes(['created_at', 'updated_at']);

        return parent::beforeValidate();
    }

}