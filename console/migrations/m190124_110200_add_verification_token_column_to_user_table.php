<?php

use \yii\db\Migration;

class m190124_110200_add_verification_token_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'role_id', $this->integer()->defaultValue(null));

        $this->addForeignKey('role', '{{%user}}', 'role_id', '{{%roles}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
        $this->dropColumn('{{%user}}', 'role_id');
    }
}
