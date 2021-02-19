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
            'name' => $this->string(100)->notNull()->unique()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%equipment}}');
    }
}
