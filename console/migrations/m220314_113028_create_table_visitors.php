<?php

use yii\db\Migration;

class m220314_113028_create_table_visitors extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%visitors}}',
            [
                'id' => $this->primaryKey(),
                'ip_address' => $this->string(64),
                'vpn' => $this->tinyInteger(4),
                'proxy' => $this->tinyInteger(4),
                'tor' => $this->tinyInteger(4),
                'city' => $this->string(64),
                'region' => $this->string(64),
                'country' => $this->string(64),
                'continent' => $this->string(64),
                'country_code' => $this->string(8),
                'latitude' => $this->string(16),
                'longitude' => $this->string(16),
                'time_zone' => $this->string(32),
                'organisation' => $this->string(64),
                'device' => $this->string(32),
                'user_agent' => $this->string(),
                'browser' => $this->string(32),
                'created_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
                'last_seen' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
                'visits' => $this->integer(),
                'status' => $this->tinyInteger(4),
                'operation_system' => $this->string(32),
                'screen' => $this->string(16),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%visitors}}');
    }
}
