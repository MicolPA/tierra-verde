<?php

use yii\db\Migration;

/**
 * Class m220507_002358_addColumnTableTourismPackages
 */
class m220507_002358_addColumnTableTourismPackages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tourist_packages_payments}}', 'location_id', $this->integer()->defaultValue(null));
        $this->addColumn('{{%tourist_packages}}', 'location_list', $this->string()->defaultValue(null));
        $this->addColumn('{{%tourist_packages}}', 'payment_setted', $this->integer()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220507_002358_addColumnTableTourismPackages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220507_002358_addColumnTableTourismPackages cannot be reverted.\n";

        return false;
    }
    */
}
