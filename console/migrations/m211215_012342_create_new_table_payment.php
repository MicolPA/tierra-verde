<?php

use yii\db\Migration;

/**
 * Class m211215_012342_create_new_table_payment
 */
class m211215_012342_create_new_table_payment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%transaction_details}}', [
            'id' => $this->primaryKey(),
            'state' => $this->string(),
            'payer_first_name' => $this->string(),
            'payer_last_name' => $this->string(),
            'payer_id' => $this->string(),
            'payer_email' => $this->string(),
            'country_code' => $this->string(),
            'invoice_number' => $this->string(),
            'amount' => $this->integer()->defaultValue(null),
            'token' => $this->string(),
            'procesado' => $this->integer()->defaultValue(0),
            'package_id' => $this->integer()->defaultValue(0),
            'client_id' => $this->integer()->defaultValue(0),
            'adults_count' => $this->integer()->defaultValue(0),
            'children_count' => $this->integer()->defaultValue(0),
            'total_amount' => $this->integer()->defaultValue(0),
            'date' => $this->dateTime(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211215_012342_create_new_table_payment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211215_012342_create_new_table_payment cannot be reverted.\n";

        return false;
    }
    */
}
