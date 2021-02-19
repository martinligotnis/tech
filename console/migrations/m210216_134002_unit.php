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
            'name' => $this->string(100)->notNull(),
            'unit_type_id' => $this->integer()->notNull(),
            'function' => $this->text()->notNull(),
            'service_interval' => $this->integer()->notNull(),
            'installation_date' => $this->integer()->notNull(),
            'last_maintenance' => $this->integer()->notNull(),
        ], $tableOptions);

        // creates index for column `unit`
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

        $this->dropTable('{{%unit}}');
    }
}
