<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%uploaded}}".
 *
 * @property integer $id
 * @property string $component
 * @property string $base_url
 * @property string $path
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property string $upload_ip
 * @property integer $created_at
 */
class Uploaded extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%uploaded}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['component', 'path'], 'required'],
            [['size'], 'integer'],
            [['component', 'name', 'type'], 'string', 'max' => 255],
            [['path', 'base_url'], 'string', 'max' => 1024],
            [['type'], 'string', 'max' => 45],
            [['upload_ip'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('uploaded', 'ID'),
            'component' => Yii::t('uploaded', 'Component'),
            'base_url' => Yii::t('uploaded', 'Base Url'),
            'path' => Yii::t('uploaded', 'Path'),
            'type' => Yii::t('uploaded', 'Type'),
            'size' => Yii::t('uploaded', 'Size'),
            'name' => Yii::t('uploaded', 'Name'),
            'upload_ip' => Yii::t('uploaded', 'Upload Ip'),
            'created_at' => Yii::t('uploaded', 'Created At')
        ];
    }
}
