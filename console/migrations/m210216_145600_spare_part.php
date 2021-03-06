<?php

use yii\db\Migration;

/**
 * Class m210216_145600_spare_part
 */
class m210216_145600_spare_part extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%spare_part}}', [
            'id' => $this->primaryKey(),
            'part_name' => $this->string(100)->notNull(),
            'producer' => $this->string(100)->notNull(),
            'model' => $this->string(100)->notNull(),
            'count' => $this->integer()->notNull(),
            'description' => $this->text(),
            'in_stock' => $this->integer()->notNull(),
            'min_stock_quantity' => $this->integer()->notNull()->defaultValue(0),
            'production_line_id' => $this->integer()->notNull(),
            'equipment_id' => $this->integer()->notNull(),
            'unit_id' => $this->integer()->notNull(),
            'unit_type_id' => $this->integer()->notNull(),
        ], $tableOptions);

        // creates index for column `unit_type_id`
        $this->createIndex(
            '{{%idx-spare_part-unit_type_id}}',
            '{{%spare_part}}',
            'unit_type_id'
        );

        // add foreign key for table `{{%unit_type}}`
        $this->addForeignKey(
            '{{%fk-spare_part-unit_type_id}}',
            '{{%spare_part}}',
            'unit_type_id',
            '{{%unit_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `unit_id`
        $this->createIndex(
            '{{%idx-spare_part-unit_id}}',
            '{{%spare_part}}',
            'unit_id'
        );

        // add foreign key for table `{{%unit}}`
        $this->addForeignKey(
            '{{%fk-spare_part-unit_id}}',
            '{{%spare_part}}',
            'unit_id',
            '{{%unit}}',
            'id',
            'CASCADE'
        );
        
        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-spare_part-equipment_id}}',
            '{{%spare_part}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-spare_part-equipment_id}}',
            '{{%spare_part}}',
            'equipment_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        ); 
        
        // creates index for column `production_line_id`
        $this->createIndex(
            '{{%idx-spare_part-production_line_id}}',
            '{{%spare_part}}',
            'production_line_id'
        );

        // add foreign key for table `{{%production_line}}`
        $this->addForeignKey(
            '{{%fk-spare_part-production_line_id}}',
            '{{%spare_part}}',
            'production_line_id',
            '{{%production_line}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `{{%unit_type}}`
        $this->dropForeignKey(
            '{{%fk-spare_part-unit_type_id}}',
            '{{%spare_part}}'
        );

        // drops index for column `unit_type_id`
        $this->dropIndex(
            '{{%idx-spare_part-unit_type_id}}',
            '{{%spare_part}}'
        );

        // drops foreign key for table `{{%unit}}`
        $this->dropForeignKey(
            '{{%fk-spare_part-unit_id}}',
            '{{%spare_part}}'
        );

        // drops index for column `unit_id`
        $this->dropIndex(
            '{{%idx-spare_part-unit_id}}',
            '{{%spare_part}}'
        );

        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-spare_part-equipment_id}}',
            '{{%spare_part}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-spare_part-equipment_id}}',
            '{{%spare_part}}'
        );

        // drops foreign key for table `{{%production_line}}`
        $this->dropForeignKey(
            '{{%fk-spare_part-production_line_id}}',
            '{{%spare_part}}'
        );

        // drops index for column `production_line_id`
        $this->dropIndex(
            '{{%idx-spare_part-production_line_id}}',
            '{{%spare_part}}'
        );

        $this->dropTable('{{%spare_part}}');
    }
}
