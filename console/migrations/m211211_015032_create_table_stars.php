<?php

use yii\db\Migration;

/**
 * Class m211211_015032_create_table_stars
 */
class m211211_015032_create_table_stars extends Migration
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

        $this->createTable('{{%tourist_packages_rating}}', [
            'id' => $this->primaryKey(),
            'rating' => $this->float(),
            'tourist_packages_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->dateTime(),
        ], $tableOptions);

        $this->addColumn('{{%tourist_packages}}', 'rating', $this->float()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211211_015032_create_table_stars cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211211_015032_create_table_stars cannot be reverted.\n";

        return false;
    }
    */
}
