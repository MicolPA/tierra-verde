<?php

use yii\db\Migration;

/**
 * Class m211125_023447_add_new_table_payment
 */
class m211125_023447_add_new_table_payment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211125_023447_add_new_table_payment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211125_023447_add_new_table_payment cannot be reverted.\n";

        return false;
    }
    */
}
