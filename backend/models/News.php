<?php

namespace backend\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $anons_uz
 * @property string $anons_ru
 * @property string $anons_en
 * @property int $category_id
 * @property int $user_id
 * @property int $status
 * @property int $views
 * @property string $created_date
 * @property string $image
 * @property string|null $crop_image
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $crop_image;
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_uz', 'description_ru', 'description_en', 'anons_uz', 'anons_ru', 'anons_en'], 'string'],
            [['category_id', 'user_id', 'status','views'], 'integer'],
            [['created_date'], 'safe'],
            [['title_uz', 'title_ru', 'title_en'], 'string', 'max' => 255],
            ['crop_image', 'string', 'max' => 255],
            [['image'], 'file',  'extensions' => ['png', 'jpg','jpeg','bmp'], 'checkExtensionByMimeType'=>true,'maxSize'=>1024*1024*8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_uz' => 'Sarlavha matni [UZ]',
            'title_ru' => 'Текст заголовка [RU]',
            'title_en' => 'Main title [EN]',
            'description_uz' => 'Batafsil matn [UZ]',
            'description_ru' => 'Подробный текст [RU]',
            'description_en' => 'Detailed text [EN]',
            'anons_uz' => 'Qisqacha anons matni [UZ]',
            'anons_ru' => 'Короткий текст анонса [RU]',
            'anons_en' => 'Short anons text [EN]',
            'category_id' => 'Kategoriyasi',
            'user_id' => 'Muallif',
            'status' => 'Holati',
            'created_date' => 'Yaratilgan sana',
            'image' => 'Rasm',
            'views' => 'Ko`rishlar'
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\NewsQuery(get_called_class());
    }

    public function afterFind()
    {
        $this->created_date = date('d.m.Y H:i:s', strtotime($this->created_date));
    }

    public function upload()
    {
        if ($this->validate() && $this->image != null) {
            // Generate random name and path to prevent replace existing file
            $file_path = '../../frontend/web/uploads/';
            $file_name = date('Ymdhis').rand(10000,99999). '.' . $this->image->extension;

            // Moving uploaded file to server directory
            $this->image->saveAs($file_path . $file_name);

            // Compress and resize image if required (boosts page load speed!)
            $image = Image::getImagine()->open($file_path . $file_name);
            if(filesize($file_path.$file_name) > 1500000){
                $image->resize($image->getSize()
                    ->scale(0.6))
                    ->save($file_path . $file_name, ['quality' => 60]);
            }

            // return random generated file name for saving to DB.
            return $file_name;
        } else {
            return null;
        }
    }
}
