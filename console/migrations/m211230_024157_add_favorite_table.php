<?php

use yii\db\Migration;

/**
 * Class m211230_024157_add_favorite_table
 */
class m211230_024157_add_favorite_table extends Migration
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
        $this->createTable('{{%favorite}}', [
            'id' => $this->primaryKey(),
            'package_id' => $this->integer(),
            'user_id' => $this->integer(),
            'date' => $this->dateTime(),
        ], $tableOptions);

        $this->addColumn('{{%tourist_packages_rating}}', 'comment', $this->text()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211230_024157_add_favorite_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211230_024157_add_favorite_table cannot be reverted.\n";

        return false;
    }
    */
}
