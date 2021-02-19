<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%production_line_equipment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%production_line}}`
 * - `{{%equipment}}`
 */
class m210216_133958_create_junction_table_for_production_line_and_equipment_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%production_line_equipment}}', [
            'production_line_id' => $this->integer(),
            'equipment_id' => $this->integer(),
            'PRIMARY KEY(production_line_id, equipment_id)',
        ]);

        // creates index for column `production_line_id`
        $this->createIndex(
            '{{%idx-production_line_equipment-production_line_id}}',
            '{{%production_line_equipment}}',
            'production_line_id'
        );

        // add foreign key for table `{{%production_line}}`
        $this->addForeignKey(
            '{{%fk-production_line_equipment-production_line_id}}',
            '{{%production_line_equipment}}',
            'production_line_id',
            '{{%production_line}}',
            'id',
            'CASCADE'
        );

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-production_line_equipment-equipment_id}}',
            '{{%production_line_equipment}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-production_line_equipment-equipment_id}}',
            '{{%production_line_equipment}}',
            'equipment_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%production_line}}`
        $this->dropForeignKey(
            '{{%fk-production_line_equipment-production_line_id}}',
            '{{%production_line_equipment}}'
        );

        // drops index for column `production_line_id`
        $this->dropIndex(
            '{{%idx-production_line_equipment-production_line_id}}',
            '{{%production_line_equipment}}'
        );

        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-production_line_equipment-equipment_id}}',
            '{{%production_line_equipment}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-production_line_equipment-equipment_id}}',
            '{{%production_line_equipment}}'
        );

        $this->dropTable('{{%production_line_equipment}}');
    }
}
