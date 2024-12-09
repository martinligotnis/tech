<?php

use yii\db\Migration;

/**
 * Class m210619_134000_maintenance_spare_part
 */
class m210619_134000_maintenance_spare_part extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%maintenance_spare_part}}', [
            'spare_part_id'         => $this->integer(),
            'maintenance_id'        => $this->integer(),
            'maintenance_action_id' => $this->integer(),
            'notes'                 => $this-> text(),
            'constant_monitoring'   => "ENUM('jā', 'nē')",
            'PRIMARY KEY(spare_part_id, maintenance_id)',
        ], $tableOptions);

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-maintenance_spare_part-spare_part_id}}',
            '{{%maintenance_spare_part}}',
            'spare_part_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-maintenance_spare_part-spare_part_id}}',
            '{{%maintenance_spare_part}}',
            'spare_part_id',
            '{{%spare_part}}',
            'id',
            'CASCADE'
        );

        // creates index for column `unit_id`
        $this->createIndex(
            '{{%idx-maintenance_spare_part-maintenance_id}}',
            '{{%maintenance_spare_part}}',
            'maintenance_id'
        );

        // add foreign key for table `{{%unit}}`
        $this->addForeignKey(
            '{{%fk-maintenance_spare_part-maintenance_id}}',
            '{{%maintenance_spare_part}}',
            'maintenance_id',
            '{{%maintenance}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `{{%unit}}`
        $this->dropForeignKey(
            '{{%fk-maintenance_spare_part-spare_part_id}}',
            '{{%maintenance_spare_part}}'
        );

        // drops index for column `unit`
        $this->dropIndex(
            '{{%idx-maintenance_spare_part-spare_part_id}}',
            '{{%maintenance_spare_part}}'
        );

        // drops foreign key for table `{{%production_line}}`
        $this->dropForeignKey(
            '{{%fk-maintenance_spare_part-maintenance_id}}',
            '{{%maintenance_spare_part}}'
        );

        // drops index for column `unit`
        $this->dropIndex(
            '{{%idx-maintenance_spare_part-maintenance_id}}',
            '{{%maintenance_spare_part}}'
        );

        $this->dropTable('{{%maintenance_spare_part}}');
    }
}