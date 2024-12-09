<?php

use yii\db\Migration;

/**
 * Class m210216_130014_equipment
 */
class m210216_130014_equipment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%equipment}}', [
            'id' => $this->primaryKey(),
            'equipment_name' => $this->string(100)->notNull(),
            'production_line_id' => $this->integer()
        ], $tableOptions);

         // creates index for column `production_line_id`
         $this->createIndex(
            '{{%idx-equipment-production_line_id}}',
            '{{%equipment}}',
            'production_line_id'
        );

        // add foreign key for table `{{%production_line}}`
        $this->addForeignKey(
            '{{%fk-equipment-production_line_id}}', 
            '{{%equipment}}',
            'production_line_id',
            '{{%production_line}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `{{%production_line}}`
        $this->dropForeignKey(
            '{{%fk-equipment-production_line_id}}',
            '{{%equipment}}'
        );

        // drops index for column `production_line_id`
        $this->dropIndex(
            '{{%idx-equipment-production_line_id}}',
            '{{%equipment}}'
        );

        $this->dropTable('{{%equipment}}');
    }
}
