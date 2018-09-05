<?php

use yii\db\Migration;

/**
 * Class m180905_172914_resourse
 */
class m180905_172915_payments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payments', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'price' => $this->double()->notNull(),
            'count' => $this->integer(11)->notNull(),
            'amount' => $this->double()->notNull(),
            'user_id' => $this->integer(11)->notNull()
        ]);

        $this->insert('payments', [
            'date' => '2018-09-02',
            'price' => 21,
            'count' => 21,
            'amount' => 441,
            'user_id' => 1
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    	$this->delete('payments', ['id' => 1]);
        $this->dropTable('payments');
    }
}
