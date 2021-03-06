<?php

use yii\db\Migration;

class m161129_211542_site_options extends Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m161129_211542_site_options cannot be reverted.\n";

        return false;
    }
    */

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%site_options}}', [
            'id' => $this->primaryKey(),
            'option_type_id' => $this->integer(),
            'option_name' => $this->string(255)->null(),
            'option_alias' => $this->string(255)->null(),
            'active' => $this->integer()->defaultValue(1),
            'sort' => $this->integer(),
        ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%site_options}}');
    }
}
