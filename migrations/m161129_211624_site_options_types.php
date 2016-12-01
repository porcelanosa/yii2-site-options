<?php

use yii\db\Migration;

class m161129_211624_site_options_types extends Migration
{
    /*public function up()
    {

    }

    public function down()
    {
        echo "m161129_211624_site_options_types cannot be reverted.\n";

        return false;
    }*/

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%site_options_types}}', [
            'id' => $this->primaryKey(),
            'type_name' => $this->string(255)->null(),
            'type_alias' => $this->string(255)->null(),
        ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%site_options_types}}');
    }
}
