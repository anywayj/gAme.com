<?php

use yii\db\Migration;

/**
 * Class m180905_172914_resourse
 */
class m180905_172914_resourse extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('resourse', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'icon' => $this->string(255)->notNull(),
            'count' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull()
        ]);

        $this->insert('resourse', [
            'name' => 'experience',
            'icon' => 'f1.png',
            'count' => '12',
            'user_id' => '1'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    	$this->delete('resourse', ['id' => 1]);
        $this->dropTable('resourse');
    }
}
