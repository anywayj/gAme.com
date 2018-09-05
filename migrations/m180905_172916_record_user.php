<?php

use yii\db\Migration;

/**
 * Class m180905_172914_resourse
 */
class m180905_172916_record_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('record_user', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull(),
            'avatarimage' => $this->string(255)->notNull()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('record_user');
    }
}
