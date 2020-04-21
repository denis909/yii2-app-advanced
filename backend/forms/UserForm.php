<?php

namespace backend\forms;

use Yii;
use yii\helpers\ArrayHelper;
use denis909\yii\TypecastBehavior;
use trntv\filekit\behaviors\UploadBehavior;

class UserForm extends \common\models\User
{

    const AVATAR_FILE_TYPES = ['gif', 'jpg', 'jpe', 'jpeg', 'png'];

    const AVATAR_MAX_SIZE = 5000000; // 5 MiB

    public $password;

    public $avatarFile;

    protected $unsafeAttributes = ['updated_at'];

    public function init()
    {
        parent::init();

        $this->status = static::STATUS_ACTIVE;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['avatarFile', 'safe'],
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
                'class' => UploadBehavior::class,
                'attribute' => 'avatarFile',
                'pathAttribute' => 'avatar',
                'filesStorage' => 'uploadedStorage'
            ],
            [
                'class' => TypecastBehavior::class,
                'attributeTypes' => [
                    'created_at' => TypecastBehavior::TYPE_UNIX_TIMESTAMP,
                    'updated_at' => TypecastBehavior::TYPE_UNIX_TIMESTAMP
                ]
            ]
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'password' => Yii::t('user', 'Password'),
            'avatarFile' => Yii::t('user', 'Avatar')
        ]);
    }

}