<?php

namespace common\models;

use Yii;
use Exception;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends \denis909\yii\ActiveRecord implements IdentityInterface
{

    const STATUS_DELETED = 0;
    
    const STATUS_INACTIVE = 9;
    
    const STATUS_ACTIVE = 10;

    const AVATAR_MAX_SIZE = 1024 * 1024 * 20;

    const AVATAR_FILE_TYPES = ['jpg', 'png', 'gif', 'jpeg', 'jpe'];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'number', 'integerOnly' => true, 'enableClientValidation' => false],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => array_keys(static::statusList())],
            ['username', 'trim'],
            ['username', 'unique', 'message' => Yii::t('messages', 'This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'message' => Yii::t('messages', 'This email address has already been taken.')]
        ];
    }

    public function getPasswordRules($attribute = 'password')
    {
        return [
            [$attribute, 'string', 'min' => 5]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'yii\behaviors\TimestampBehavior',
            'denis909\yii\UserRbacBehavior',
            [
                'class' => 'denis909\yii\DatetimeFormatterBehavior',
                'attributes' => [
                    'created_at' => 'createdAsDatetime', 
                    'updated_at' => 'updatedAsDatetime'
                ]
            ]
        ]);
    }

    public static function statusList()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('user', 'Active'), 
            self::STATUS_INACTIVE => Yii::t('user', 'Inactive'), 
            self::STATUS_DELETED => Yii::t('user', 'Deleted')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token))
        {
            return null;
        }

        return static::findOne(['password_reset_token' => $token, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne(['verification_token' => $token, 'status' => self::STATUS_INACTIVE]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token))
        {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);

        $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if ($insert)
        {
            $this->generateAuthKey();

            $this->generateEmailVerificationToken();
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'username' => Yii::t('user', 'Username'),
            'created_at' => Yii::t('user', 'Created'),
            'updated_at' => Yii::t('user', 'Updated'),
            'status' => Yii::t('user', 'Status'),
            'password_hash' => Yii::t('user', 'Password'),
            'email' => Yii::t('user', 'E-mail'),
            'roles' => Yii::t('user', 'Roles')
        ];
    }

    public function isStatus($status)
    {
        return $status == $this->status;
    }

    public function setStatus($status, $save = false, $validate = true, $attributes = null)
    {
        $this->status = $status;

        if ($save && !$this->save($validate, $attributes))
        {
            throw new Exception($this->firstError);
        }        
    }

    public function getIsStatusActive()
    {
        return $this->isStatus(static::STATUS_ACTIVE);
    }

    public function getIsStatusInactive()
    {
        return $this->isStatus(static::STATUS_INACTIVE);
    }

    public function getIsStatusDeleted()
    {
        return $this->isStatus(static::STATUS_DELETED);
    }

    public function setStatusActive($save = false, $validate = true, $attributes = null)
    {
        $this->setStatus(static::STATUS_ACTIVE, $save, $validate, $attributes);
    }

    public function setStatusDeleted($save = false, $validate = true, $attributes = null)
    {
        $this->setStatus(static::STATUS_DELETED, $save, $validate, $attributes);
    }

    public function setStatusInactive($save = false, $validate = true, $attributes = null)
    {
        $this->setStatus(static::STATUS_INACTIVE, $save, $validate, $attributes);
    }

    /*
    public function beforeValidate()
    {
        echo '<pre>';
        print_r($_POST);
        die;    
    }
    */

}