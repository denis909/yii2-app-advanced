<?php

namespace backend\forms;

use Yii;
use yii\helpers\ArrayHelper;
use denis909\yii\TypecastBehavior;

class UserForm extends \common\models\User
{

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
            [['username', /*'email', */'status'], 'required'],
            [['password'], 'string', 'min' => 5, 'max' => 255],
            /*
            [
                'password', 
                'required', 
                'when' => function($model) {
                    return $model->isNewRecord;
                },
                'enableClientValidation' => false
            ],
            */
            [
                'created_at',
                'required',
                'when' => function($model) {
                    return !$model->isNewRecord;
                },
                'enableClientValidation' => false                
            ],
            ['roles', 'safe'],
            ['avatarFile', 'safe']
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
                'class' => 'denis909\storage\StorageUploadBehavior',
                'attribute' => 'avatarFile',
                'pathAttribute' => 'avatar'
            ],
            [
                'class' => TypecastBehavior::class,
                'attributeTypes' => [
                    'created_at' => TypecastBehavior::TYPE_UNIX_TIMESTAMP,
                    'updated_at' => TypecastBehavior::TYPE_UNIX_TIMESTAMP
                ]
            ],
            'saveRelations' => [
                'class'     => 'lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior',
                'relations' => [
                    'roles'
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