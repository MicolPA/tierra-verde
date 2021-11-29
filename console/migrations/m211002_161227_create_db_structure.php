<?php

use yii\db\Migration;

/**
 * Class m211002_161227_create_db_structure
 */
class m211002_161227_create_db_structure extends Migration
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

        $this->createTable('{{%tourist_packages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'location_id' => $this->integer()->notNull(),
            'kids' => $this->integer()->defaultValue(1)->notNull(),
            'age_restricted' => $this->integer()->notNull(),
            'pick_up_location_id' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'image_1' => $this->string()->notNull(),
            'image_2' => $this->string(),
            'image_3' => $this->string(),
            'image_4' => $this->string(),
            'image_5' => $this->string(),
            'image_6' => $this->string(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%packages_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%tourist_packages_payments}}', [
            'id' => $this->primaryKey(),
            'from' => $this->integer()->notNull(),
            'until' => $this->integer()->notNull(),
            'adults_amount' => $this->integer()->notNull(),
            'kids_amount' => $this->integer()->notNull(),
            'tourist_packages_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%reservations_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'color' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);


        $this->createTable('{{%reservations}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'package_id' => $this->integer()->notNull(),
            'adults' => $this->integer()->notNull(),
            'kids' => $this->integer()->notNull(),
            'status_id' => $this->integer()->defaultValue(0)->notNull(),
            'user_id' => $this->integer()->defaultValue(0)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'cellphone' => $this->string()->notNull(),
            'kid' => $this->integer()->notNull(),
            'type_id' => $this->integer()->defaultValue(null)->notNull(),
            'package_id' => $this->integer()->defaultValue(null)->notNull(),
            'pick_up_location_id' => $this->integer()->defaultValue(null)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('client', '{{%reservations}}', 'client_id', '{{%clients}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('type', '{{%tourist_packages}}', 'type_id', '{{%packages_type}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('location', '{{%tourist_packages}}', 'location_id', '{{%location}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('package', '{{%reservations}}', 'package_id', '{{%tourist_packages}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('status', '{{%reservations}}', 'status_id', '{{%reservations_status}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211002_161227_create_db_structure cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211002_161227_create_db_structure cannot be reverted.\n";

        return false;
    }
    */
}
