<?php

use yii\db\Migration;

/**
 * Class m210520_103100_spare_part_log
 */
class m210520_103100_spare_part_log extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%spare_part_log}}', [
            'id'                    => $this->primaryKey(),
            'spare_part_id'         => $this->integer()->notNull(),
            'date'                  => $this->dateTime()->notNull(),
            'status'                => $this->string(100)->notNull(),
            'coments'               => $this->text(),
        ], $tableOptions);

        // creates index for column `unit_type_id`
        $this->createIndex(
            '{{%idx-spare_part_log-spare_part_id}}',
            '{{%spare_part_log}}',
            'spare_part_id'
        );

        // add foreign key for table `{{%unit_type}}`
        $this->addForeignKey(
            '{{%fk-spare_part_log-spare_part_id}}',
            '{{%spare_part_log}}',
            'spare_part_id',
            '{{%spare_part}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `{{%unit_type}}`
        $this->dropForeignKey(
            '{{%fk-spare_part_log-spare_part_id}}',
            '{{%spare_part_log}}'
        );

        // drops index for column `unit_type_id`
        $this->dropIndex(
            '{{%idx-spare_part_log-spare_part_id}}',
            '{{%spare_part_log}}'
        );

        $this->dropTable('{{%spare_part_log}}');
    }
}
