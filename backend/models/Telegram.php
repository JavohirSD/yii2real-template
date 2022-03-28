<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "telegram".
 *
 * @property int $id
 * @property string $bot_token
 * @property string|null $feedback_group
 * @property string|null $payment_group
 * @property string|null $main_channel
 * @property string|null $info_channel
 * @property string|null $admin_username
 * @property string|null $moder_username
 * @property string|null $current_host
 * @property string $created_date
 * @property string $updated_date
 * @property int $status
 * @property string|null $bot_username
 */
class Telegram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $crop_image;
    public static function tableName()
    {
        return 'telegram';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bot_token'], 'required'],
            [['created_date', 'updated_date'], 'default', 'value'=> date('Y-m-d H:i:s')],
            [['status'], 'integer'],
            [['bot_token', 'feedback_group', 'payment_group', 'main_channel', 'info_channel', 'admin_username', 'moder_username', 'bot_username'], 'string', 'max' => 64],
            [['current_host'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bot_token' => 'Bot Token',
            'feedback_group' => 'Feedback Group',
            'payment_group' => 'Payment Group',
            'main_channel' => 'Main Channel',
            'info_channel' => 'Info Channel',
            'admin_username' => 'Admin Username',
            'moder_username' => 'Moder Username',
            'current_host' => 'Current Host',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'bot_username' => 'Bot Username',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\TelegramQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\TelegramQuery(get_called_class());
    }

    public function afterFind()
    {
        $this->created_date = date('d.m.Y H:i:s', strtotime($this->created_date));
    }

    public function beforeSave($insert)
    {
        $this->created_date = date('Y-m-d H:i:s', strtotime($this->created_date));
         return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    }
