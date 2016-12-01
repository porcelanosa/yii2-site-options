<?php

use yii\db\Migration;

class m161201_135638_site_options_values extends Migration
{


    /*public function up()
    {

    }

    public function down()
    {
        echo "m161201_135638_site_options_values cannot be reverted.\n";

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

        $this->createTable('{{%site_options_values}}', [
            'id' => $this->primaryKey(),
            'option_type_id' => $this->integer(),
            'value' => $this->string(255)->null(),
            'text_value' => $this->text(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_options_values}}');
    }
}
