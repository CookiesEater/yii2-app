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
        $this->insert( '{{%user}}', [
            'email' => 'admin@example.com',
            'password' => Yii::$app->security->generatePasswordHash( '' ),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => new \yii\db\Expression( 'NOW()' ),
            'updated_at' => new \yii\db\Expression( 'NOW()' ),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable( '{{%user}}' );
    }
}
