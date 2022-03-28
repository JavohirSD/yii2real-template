<?php

use yii\db\Migration;

class m220314_113024_create_table_seo extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%seo}}',
            [
                'id' => $this->primaryKey(),
                'title_uz' => $this->string(),
                'title_ru' => $this->string(),
                'title_en' => $this->string(),
                'description_uz' => $this->text(),
                'description_ru' => $this->text(),
                'description_en' => $this->text(),
                'icon' => $this->string(),
                'og_image' => $this->string(),
                'og_type' => $this->string(),
                'keywords' => $this->text(),
                'author' => $this->string(),
                'reply_email' => $this->string(),
                'google_verify' => $this->text(),
                'yandex_verify' => $this->text(),
                'google_analytics' => $this->text(),
                'yandex_metrika' => $this->text(),
                'og_title_uz' => $this->string(),
                'og_title_ru' => $this->string(),
                'og_title_en' => $this->string(),
                'status' => $this->integer(),
                'created_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%seo}}');
    }
}
