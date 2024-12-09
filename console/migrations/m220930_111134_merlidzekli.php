<?php

use yii\db\Migration;

/**
 * Class m220930_111134_merlidzekli
 */
class m220930_111134_merlidzekli extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%merlidzekli}}', [
            'id' => $this->primaryKey(),
            'merlidzekli_name' => $this->string(100)->notNull(),
            'merlidzekli_type' => $this->string(100)->notNull(),
            'merlidzekli_serial_no' => $this->string(100)->notNull(),
            'merlidzekli_range' => $this->string(100)->notNull(),
            'merlidzekli_producer' => $this->string(100)->notNull(),
            'merlidzekli_last_inspection' => $this->dateTime()->notNull(),
            'merlidzekli_sertificate' => $this->string(100)->notNull(),
            'merlidzekli_sticker_no' => $this->string(100)->notNull(),
            'merlidzekli_next_sertification' => $this->dateTime()->notNull()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%merlidzekli}}');
    }
}