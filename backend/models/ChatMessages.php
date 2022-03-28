<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "chat_messages".
 *
 * @property int $id
 * @property int $user_id
 * @property int $operator_id
 * @property string $message
 * @property int $created_at
 * @property int $status
 * @property string|null $ip_address
 * @property int $seen
 */
class ChatMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $crop_image;
    public static function tableName()
    {
        return 'chat_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'operator_id', 'message', 'created_at'], 'required'],
            [['user_id', 'operator_id', 'created_at', 'status', 'seen'], 'integer'],
            [['message'], 'string'],
            [['ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'operator_id' => 'Operator ID',
            'message' => 'Message',
            'created_at' => 'Created At',
            'status' => 'Status',
            'ip_address' => 'Ip Address',
            'seen' => 'Seen',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\ChatMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\ChatMessagesQuery(get_called_class());
    }

    public function afterFind()
    {
        $this->created_date = date('d.m.Y H:i:s', strtotime($this->created_date));
    }

    public function beforeSave($insert)
    {
         $this->created_date = $this->created_date != null ? date('Y-m-d H:i:s', strtotime($this->created_date)) : date('Y-m-d H:i:s');
         return parent::beforeSave($insert);
    }

    }
