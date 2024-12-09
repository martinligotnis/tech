<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%merlidzekliMerlidzekli_type}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%merlidzekli}}`
 * - `{{%merlidzekli_type}}`
 */
class m220930_113321_create_merlidzekliMerlidzekli_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%merlidzekliMerlidzekli_type}}', [
            'id' => $this->primaryKey(),
            'merlidzekli_id' => $this->integer()->notNull(),
            'merlidzekli_type_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `merlidzekli_id`
        $this->createIndex(
            '{{%idx-merlidzekliMerlidzekli_type-merlidzekli_id}}',
            '{{%merlidzekliMerlidzekli_type}}',
            'merlidzekli_id'
        );

        // add foreign key for table `{{%merlidzekli}}`
        $this->addForeignKey(
            '{{%fk-merlidzekliMerlidzekli_type-merlidzekli_id}}',
            '{{%merlidzekliMerlidzekli_type}}',
            'merlidzekli_id',
            '{{%merlidzekli}}',
            'id',
            'CASCADE'
        );

        // creates index for column `merlidzekli_type_id`
        $this->createIndex(
            '{{%idx-merlidzekliMerlidzekli_type-merlidzekli_type_id}}',
            '{{%merlidzekliMerlidzekli_type}}',
            'merlidzekli_type_id'
        );

        // add foreign key for table `{{%merlidzekli_type}}`
        $this->addForeignKey(
            '{{%fk-merlidzekliMerlidzekli_type-merlidzekli_type_id}}',
            '{{%merlidzekliMerlidzekli_type}}',
            'merlidzekli_type_id',
            '{{%merlidzekli_type}}',
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
            '{{%fk-merlidzekliMerlidzekli_type-merlidzekli_id}}',
            '{{%merlidzekliMerlidzekli_type}}'
        );

        // drops index for column `merlidzekli_id`
        $this->dropIndex(
            '{{%idx-merlidzekliMerlidzekli_type-merlidzekli_id}}',
            '{{%merlidzekliMerlidzekli_type}}'
        );

        // drops foreign key for table `{{%merlidzekli_type}}`
        $this->dropForeignKey(
            '{{%fk-merlidzekliMerlidzekli_type-merlidzekli_type_id}}',
            '{{%merlidzekliMerlidzekli_type}}'
        );

        // drops index for column `merlidzekli_type_id`
        $this->dropIndex(
            '{{%idx-merlidzekliMerlidzekli_type-merlidzekli_type_id}}',
            '{{%merlidzekliMerlidzekli_type}}'
        );

        $this->dropTable('{{%merlidzekliMerlidzekli_type}}');
    }
}
