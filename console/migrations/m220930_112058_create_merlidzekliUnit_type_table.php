<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%merlidzekliUnit_type}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%merlidzekli}}`
 * - `{{%unit_type}}`
 */
class m220930_112058_create_merlidzekliUnit_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%merlidzekliUnit_type}}', [
            'id' => $this->primaryKey(),
            'merlidzekli_id' => $this->integer()->notNull(),
            'unit_type_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `merlidzekli_id`
        $this->createIndex(
            '{{%idx-merlidzekliUnit_type-merlidzekli_id}}',
            '{{%merlidzekliUnit_type}}',
            'merlidzekli_id'
        );

        // add foreign key for table `{{%merlidzekli}}`
        $this->addForeignKey(
            '{{%fk-merlidzekliUnit_type-merlidzekli_id}}',
            '{{%merlidzekliUnit_type}}',
            'merlidzekli_id',
            '{{%merlidzekli}}',
            'id',
            'CASCADE'
        );

        // creates index for column `unit_type_id`
        $this->createIndex(
            '{{%idx-merlidzekliUnit_type-unit_type_id}}',
            '{{%merlidzekliUnit_type}}',
            'unit_type_id'
        );

        // add foreign key for table `{{%unit_type}}`
        $this->addForeignKey(
            '{{%fk-merlidzekliUnit_type-unit_type_id}}',
            '{{%merlidzekliUnit_type}}',
            'unit_type_id',
            '{{%unit_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%merlidzekli}}`
        $this->dropForeignKey(
            '{{%fk-merlidzekliUnit_type-merlidzekli_id}}',
            '{{%merlidzekliUnit_type}}'
        );

        // drops index for column `merlidzekli_id`
        $this->dropIndex(
            '{{%idx-merlidzekliUnit_type-merlidzekli_id}}',
            '{{%merlidzekliUnit_type}}'
        );

        // drops foreign key for table `{{%unit_type}}`
        $this->dropForeignKey(
            '{{%fk-merlidzekliUnit_type-unit_type_id}}',
            '{{%merlidzekliUnit_type}}'
        );

        // drops index for column `unit_type_id`
        $this->dropIndex(
            '{{%idx-merlidzekliUnit_type-unit_type_id}}',
            '{{%merlidzekliUnit_type}}'
        );

        $this->dropTable('{{%merlidzekliUnit_type}}');
    }
}
