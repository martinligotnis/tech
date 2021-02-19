<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%unit_equipment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%unit}}`
 * - `{{%equipment}}`
 */
class m210216_145519_create_junction_table_for_unit_andequipment_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%unit_equipment}}', [
            'unit_id' => $this->integer(),
            'equipment_id' => $this->integer(),
            'PRIMARY KEY(unit_id, equipment_id)',
        ]);

        // creates index for column `unit_id`
        $this->createIndex(
            '{{%idx-unit_equipment-unit_id}}',
            '{{%unit_equipment}}',
            'unit_id'
        );

        // add foreign key for table `{{%unit}}`
        $this->addForeignKey(
            '{{%fk-unit_equipment-unit_id}}',
            '{{%unit_equipment}}',
            'unit_id',
            '{{%unit}}',
            'id',
            'CASCADE'
        );

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-unit_equipment-equipment_id}}',
            '{{%unit_equipment}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-unit_equipment-equipment_id}}',
            '{{%unit_equipment}}',
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
        // drops foreign key for table `{{%unit}}`
        $this->dropForeignKey(
            '{{%fk-unit_equipment-unit_id}}',
            '{{%unit_equipment}}'
        );

        // drops index for column `unit_id`
        $this->dropIndex(
            '{{%idx-unit_equipment-unit_id}}',
            '{{%unit_equipment}}'
        );

        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-unit_equipment-equipment_id}}',
            '{{%unit_equipment}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-unit_equipment-equipment_id}}',
            '{{%unit_equipment}}'
        );

        $this->dropTable('{{%unit_equipment}}');
    }
}
