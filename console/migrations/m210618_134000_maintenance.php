<?php

use yii\db\Migration;

/**
 * Class m210618_134000_maintenance
 */
class m210618_134000_maintenance extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%maintenance}}', [
            'id' => $this->primaryKey(),            
            'maintenance_date'          => $this->date(),
            'equipment_id'              => $this->integer()->notNull(),            
            'unit_id'                   => $this->integer()->notNull(),
            'next_maintenance'          => $this->date(),
            'need_of_monitoring'        => "ENUM('vajadzīgs', 'nav vajadzīgs')",
        ], $tableOptions);

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-maintenance-equipment_id}}',
            '{{%maintenance}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-maintenance-equipment_id}}',
            '{{%maintenance}}',
            'equipment_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        );

        // creates index for column `unit_id`
        $this->createIndex(
            '{{%idx-maintenance-unit_id}}',
            '{{%maintenance}}',
            'unit_id'
        );

        // add foreign key for table `{{%unit}}`
        $this->addForeignKey(
            '{{%fk-maintenance-unit_id}}',
            '{{%maintenance}}',
            'unit_id',
            '{{%unit}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `{{%unit}}`
        $this->dropForeignKey(
            '{{%fk-maintenance-equipment_id}}',
            '{{%maintenance}}'
        );

        // drops index for column `unit`
        $this->dropIndex(
            '{{%idx-maintenance-equipment_id}}',
            '{{%maintenance}}'
        );

        // drops foreign key for table `{{%production_line}}`
        $this->dropForeignKey(
            '{{%fk-maintenance-unit_id}}',
            '{{%maintenance}}'
        );

        // drops index for column `unit`
        $this->dropIndex(
            '{{%idx-maintenance-unit_id}}',
            '{{%maintenance}}'
        );

        $this->dropTable('{{%maintenance}}');
    }
}
