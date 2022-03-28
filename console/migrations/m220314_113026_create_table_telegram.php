<?php

use yii\db\Migration;

class m220314_113026_create_table_telegram extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%telegram}}',
            [
                'id' => $this->primaryKey(),
                'bot_token' => $this->string(64)->notNull(),
                'feedback_group' => $this->string(64),
                'payment_group' => $this->string(64),
                'main_channel' => $this->string(64),
                'info_channel' => $this->string(64),
                'admin_username' => $this->string(64),
                'moder_username' => $this->string(64),
                'current_host' => $this->string(128),
                'created_date' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated_date' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'status' => $this->tinyInteger(4)->notNull()->defaultValue('1'),
                'bot_username' => $this->string(64),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%telegram}}');
    }
}
