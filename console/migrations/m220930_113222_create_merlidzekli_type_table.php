<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%merlidzekli_type}}`.
 */
class m220930_113222_create_merlidzekli_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%merlidzekli_type}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%merlidzekli_type}}');
    }
}
