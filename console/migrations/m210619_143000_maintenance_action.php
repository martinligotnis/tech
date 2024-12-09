<?php

use yii\db\Migration;

/**
 * Class m210619_143000_maintenance_action
 */
class m210619_143000_maintenance_action extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%maintenance_action}}', [
            'id'        => $this->primaryKey(),            
            'action'    => $this->string(100),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%maintenance_action}}');
    }
}
