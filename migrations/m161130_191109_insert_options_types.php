<?php

use yii\db\Migration;

class m161130_191109_insert_options_types extends Migration
{
    /*public function up()
    {

    }

    public function down()
    {
        echo "m161130_191109_insert_options_type cannot be reverted.\n";

        return false;
    }
    */


    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->insert('{{%site_options_types}}', [
            'type_name' => 'Строка',
            'type_alias' => 'string',
        ]);
        $this->insert('{{%site_options_types}}', [
            'type_name' => 'Текст',
            'type_alias' => 'text',
        ]);
        $this->insert('{{%site_options_types}}', [
            'type_name' => 'Чекбокс',
            'type_alias' => 'boolean',
        ]);
        $this->insert('{{%site_options_types}}', [
            'type_name' => 'Изображение',
            'type_alias' => 'image',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%site_options_types}}', 'type_alias=:alias', [':alias'=>'boolean']);
        $this->delete('{{%site_options_types}}', 'type_alias=:alias', [':alias'=>'string']);
        $this->delete('{{%site_options_types}}', 'type_alias=:alias', [':alias'=>'text']);
        $this->delete('{{%site_options_types}}', 'type_alias=:alias', [':alias'=>'image']);
    }
}
