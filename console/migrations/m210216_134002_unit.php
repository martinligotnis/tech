<?php

use yii\db\Migration;

/**
 * Class m210216_134002_unit
 */
class m210216_134002_unit extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%unit}}', [
            'id' => $this->primaryKey(),
            'equipment_id' => $this->integer()->notNull(),
            'production_line_id' => $this->integer()->notNull(),
            'unit_name' => $this->string(100)->notNull(),
            'unit_type_id' => $this->integer()->notNull(),
            'unit_function' => $this->text()->notNull(),
            'unit_service_interval' => $this->integer()->notNull(),
            'unit_installation_date' => $this->dateTime()->notNull(),
            'unit_last_maintenance' => $this->dateTime()->notNull(),
        ], $tableOptions);

        // creates index for column `unit_type_id`
        $this->createIndex(
            '{{%idx-unit-unit_type_id}}',
            '{{%unit}}',
            'unit_type_id'
        );

        // add foreign key for table `{{%unit}}`
        $this->addForeignKey(
            '{{%fk-unit-unit_type_id}}',
            '{{%unit}}',
            'unit_type_id',
            '{{%unit_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `production_line_id`
        $this->createIndex(
            '{{%idx-unit-production_line_id}}',
            '{{%unit}}',
            'production_line_id'
        );

        // add foreign key for table `{{%production_line}}`
        $this->addForeignKey(
            '{{%fk-unit-production_line_id}}',
            '{{%unit}}',
            'production_line_id',
            '{{%production_line}}',
            'id',
            'CASCADE'
        );

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-unit-equipment_id}}',
            '{{%unit}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-unit-equipment_id}}',
            '{{%unit}}',
            'equipment_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `{{%unit}}`
        $this->dropForeignKey(
            '{{%fk-unit-unit_type_id}}',
            '{{%unit}}'
        );

        // drops index for column `unit`
        $this->dropIndex(
            '{{%idx-unit-unit_type_id}}',
            '{{%unit}}'
        );

        // drops foreign key for table `{{%production_line}}`
        $this->dropForeignKey(
            '{{%fk-unit-production_line_id}}',
            '{{%unit}}'
        );

        // drops index for column `unit`
        $this->dropIndex(
            '{{%idx-unit-production_line_id}}',
            '{{%unit}}'
        );

         // drops foreign key for table `{{%equipment}}`
         $this->dropForeignKey(
            '{{%fk-unit-equipment_id}}',
            '{{%unit}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-unit-equipment_id}}',
            '{{%unit}}'
        );

        $this->dropTable('{{%unit}}');
    }
}
