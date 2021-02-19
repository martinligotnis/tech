<?php

use yii\db\Migration;

/**
 * Class m210216_130013_production_line
 */
class m210216_130013_production_line extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%production_line}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%production_line}}');
    }
}
