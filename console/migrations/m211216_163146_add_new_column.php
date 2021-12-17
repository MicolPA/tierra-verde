<?php

use yii\db\Migration;

/**
 * Class m211216_163146_add_new_column
 */
class m211216_163146_add_new_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'phone', $this->string()->defaultValue(null));
        $this->addColumn('{{%clients}}', 'location_id', $this->integer()->defaultValue(null));
        $this->addColumn('{{%clients}}', 'user_id', $this->integer()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211216_163146_add_new_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211216_163146_add_new_column cannot be reverted.\n";

        return false;
    }
    */
}
