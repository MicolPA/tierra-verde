<?php

use yii\db\Migration;

/**
 * Class m211129_235242_create_new_table_subcat
 */
class m211129_235242_create_new_table_subcat extends Migration
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

        $this->createTable('{{%packages_sub_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'icon_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('{{%icon}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'html' => $this->string(),
        ], $tableOptions);

        $this->addColumn('{{%tourist_packages}}', 'sub_type_id', $this->integer()->defaultValue(null));
        $this->addForeignKey('subtype', '{{%tourist_packages}}', 'sub_type_id', '{{%packages_sub_type}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('icon', '{{%packages_sub_type}}', 'icon_id', '{{%icon}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211129_235242_create_new_table_subcat cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211129_235242_create_new_table_subcat cannot be reverted.\n";

        return false;
    }
    */
}
