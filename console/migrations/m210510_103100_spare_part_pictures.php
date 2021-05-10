<?php

use yii\db\Migration;

/**
 * Class m210510_103100_spare_part_pictures
 */
class m210510_103100_spare_part_pictures extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%spare_part_pictures}}', [
            'id'                    => $this->primaryKey(),
            'spare_part_id'         => $this->integer()->notNull(),
            'url'                   => $this->string(500)->notNull(),
            'picture_name'          => $this->string(100)->notNull(),
        ], $tableOptions);

        // creates index for column `unit_type_id`
        $this->createIndex(
            '{{%idx-spare_part_pictures-spare_part_id}}',
            '{{%spare_part_pictures}}',
            'spare_part_id'
        );

        // add foreign key for table `{{%unit_type}}`
        $this->addForeignKey(
            '{{%fk-spare_part_pictures-spare_part_id}}',
            '{{%spare_part_pictures}}',
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
            '{{%fk-spare_part_pictures-spare_part_id}}',
            '{{%spare_part_pictures}}'
        );

        // drops index for column `unit_type_id`
        $this->dropIndex(
            '{{%idx-spare_part_pictures-spare_part_id}}',
            '{{%spare_part_pictures}}'
        );

        $this->dropTable('{{%spare_part}}');
    }
}
