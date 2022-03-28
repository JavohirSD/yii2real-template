<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string|null $icon
 * @property string|null $og_image
 * @property string|null $og_type
 * @property string|null $keywords
 * @property string|null $author
 * @property string|null $reply_email
 * @property string|null $google_verify
 * @property string|null $yandex_verify
 * @property string|null $google_analytics
 * @property string|null $yandex_metrika
 * @property string|null $og_title_uz
 * @property string|null $og_title_ru
 * @property string|null $og_title_en
 * @property int|null $status
 * @property string|null $created_date
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'description_en', 'keywords', 'google_verify','yandex_verify','google_analytics', 'yandex_metrika'], 'string'],
            [['status'], 'integer'],
            [['created_date'], 'safe'],
            [['title_uz', 'title_ru', 'title_en', 'og_type', 'author', 'reply_email', 'og_title_uz', 'og_title_ru', 'og_title_en'], 'string', 'max' => 255],
            [['icon','og_image'], 'file',  'extensions' => ['png', 'jpg','jpeg','bmp','svg'], 'checkExtensionByMimeType'=>true,'maxSize'=>1024*1024*2],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_uz' => 'Sayt sarlavhasi [UZ]',
            'title_ru' => 'Sayt sarlavhasi [RU]',
            'title_en' => 'Sayt sarlavhasi [EN]',
            'description_uz' => 'Sayt haqida ma`lumot [UZ]',
            'description_ru' => 'Sayt haqida ma`lumot [RU]',
            'description_en' => 'Sayt haqida ma`lumot [EN]',
            'icon' => 'Sayt logotipi (Brauzerlar uchun)',
            'og_image' => 'Sayt logotipi (Ijtimoiy tarmoq uchun)',
            'og_type'  => 'Sayt turi/kategoriyasi',
            'keywords' => 'Kalit so`zlar',
            'author'   => 'Sayt muallifi (Buyurtmachi)',
            'reply_email'   => 'Email manzil',
            'google_verify' => 'Google Verify tokeni',
            'yandex_verify' => 'Yandex Verify tokeni',
            'google_analytics' => 'Google Analytics skripti',
            'yandex_metrika'   => 'Yandex Metrika skripti',
            'og_title_uz' => 'Sayt nomi [UZ]',
            'og_title_ru' => 'Sayt nomi [RU]',
            'og_title_en' => 'Sayt nomi [EN]',
            'status' => 'Meta teglar holati',
            'created_date' => 'Yaratilgan sana',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\SeoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\SeoQuery(get_called_class());
    }

    public function upload()
    {
        if ($this->validate() && $this->icon != null) {
              $file_path = Yii::getAlias('@frontend') . '/web/uploads/';
              $this->icon->saveAs($file_path . md5($this->icon->baseName). '.' . $this->icon->extension);
            return true;
        } else {
            return false;
        }
    }
}
