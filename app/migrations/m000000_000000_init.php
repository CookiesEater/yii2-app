<?php

use yii\db\Migration;

class m000000_000000_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => 'int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'email' => 'varchar(64) NOT NULL UNIQUE',
            'password' => 'varchar(255) NOT NULL',
            'auth_key' => 'varchar(255) NOT NULL',
            'created_at' => 'datetime(6) NOT NULL',
            'updated_at' => 'datetime(6) NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable( '{{%user}}' );
    }
}
