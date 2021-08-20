<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "visitors".
 *
 * @property int $id
 * @property string|null $ip_address
 * @property int|null $vpn
 * @property int|null $proxy
 * @property int|null $tor
 * @property string|null $city
 * @property string|null $region
 * @property string|null $country
 * @property string|null $continent
 * @property string|null $country_code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $time_zone
 * @property string|null $organisation
 * @property string|null $device
 * @property string|null $user_agent
 * @property string|null $browser
 * @property string|null $created_date
 * @property string|null $last_seen
 * @property int|null $visits
 * @property int|null $status
 * @property string|null $operation_system
 * @property string|null $screen
 */
class Visitors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visitors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visits', 'status','vpn', 'proxy', 'tor'], 'integer'],
            [['created_date', 'last_seen'], 'safe'],
            [['ip_address', 'city', 'region', 'country', 'continent', 'organisation'], 'string', 'max' => 64],
            [['country_code'], 'string', 'max' => 8],
            [['latitude', 'longitude', 'screen'], 'string', 'max' => 16],
            [['time_zone', 'device', 'browser', 'operation_system'], 'string', 'max' => 32],
            [['user_agent'], 'string', 'max' => 255],
            [['vpn', 'proxy', 'tor'], 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip_address' => 'IP Manzil',
            'vpn' => 'VPN',
            'proxy' => 'Proxy',
            'tor' => 'TOR',
            'city' => 'Shahar',
            'region' => 'Hudud',
            'country' => 'Mamlakat',
            'continent' => 'Kontinent',
            'country_code' => 'Mamlakat kodi',
            'latitude' => 'Latituda',
            'longitude' => 'Longituda',
            'time_zone' => 'Vaqt zonasi',
            'organisation' => 'Provayder tashkilot',
            'device' => 'Qurulma turi',
            'user_agent' => 'User Agent',
            'browser' => 'Brauzer',
            'created_date' => 'Yaratilgan sana',
            'last_seen' => 'So`ngi faollik',
            'visits' => 'Tashriflar soni',
            'status' => 'Holati',
            'operation_system' => 'Operatsion tizim',
            'screen' => 'Ekran o`lchami',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\VisitorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\VisitorsQuery(get_called_class());
    }

    public function upload()
    {
        if ($this->validate(false)) {
            $this->image->saveAs('../../frontend/web/uploads/' . md5($this->image->baseName). '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
