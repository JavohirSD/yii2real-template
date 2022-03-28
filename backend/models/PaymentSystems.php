<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "payment_systems".
 *
 * @property int $id
 * @property string $title
 * @property string $periods
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $updated_by
 * @property int $is_loan
 */
class PaymentSystems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $crop_image;
    public static function tableName()
    {
        return 'payment_systems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'periods', 'updated_by', 'is_loan'], 'required'],
            [['status', 'created_at', 'updated_at', 'updated_by', 'is_loan'], 'integer'],
            [['title', 'periods'], 'string', 'max' => 255],
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
            'periods' => 'Periods',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_loan' => 'Is Loan',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\PaymentSystemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\PaymentSystemsQuery(get_called_class());
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
