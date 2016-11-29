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
            'option_id' => $this->integer(),
            'value' => $this->string(255)->null(),
            'text_value' => $this->text(),
        ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%site_options}}');
    }
}
