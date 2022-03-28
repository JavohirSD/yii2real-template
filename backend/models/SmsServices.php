<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "sms_services".
 *
 * @property int $id
 * @property string $title
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $updated_by
 * @property int $status
 */
class SmsServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $crop_image;
    public static function tableName()
    {
        return 'sms_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'updated_by'], 'required'],
            [['created_at', 'updated_at', 'updated_by', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\SmsServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\SmsServicesQuery(get_called_class());
    }

    public function afterFind()
    {
        $this->created_date = date('d.m.Y H:i:s', strtotime($this->created_date));
    }

    public function beforeSave($insert)
    {
         $this->created_date = $this->created_date != null ? date('Y-m-d H:i:s', strtotime($this->created_date)) : date('Y-m-d H:i:s');
    }

    }
