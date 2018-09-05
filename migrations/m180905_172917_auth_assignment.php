<?php

use yii\db\Migration;

/**
 * Class m180905_172914_resourse
 */
class m180905_172917_auth_assignment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_assignment', [
            'item_name' => $this->string(255)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin',
            'user_id' => 1,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('auth_assignment', ['id' => 1]);
        $this->dropTable('auth_assignment');
    }
}
