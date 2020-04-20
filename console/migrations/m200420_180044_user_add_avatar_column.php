<?php

use yii\db\Migration;

/**
 * Class m200420_180044_user_add_avatar_column
 */
class m200420_180044_user_add_avatar_column extends Migration
{

    public $tableName = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'avatar', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'avatar');
    }

}