<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $image;
    public $description;
    public $password_hash;
    public $crop_image;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            [['description','password_hash','crop_image'],'safe'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            [['image'], 'file',  'extensions' => ['png', 'jpg','jpeg','bmp','svg'], 'checkExtensionByMimeType'=>true,'maxSize'=>1024*1024*8],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email    = $this->email;
        $user->status   = 10; //9
        $user->description = $this->description;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->image   = $this->crop_image==null?UploadedFile::getInstance($this, 'image'):$this->crop_image;

            if ($this->crop_image==null && $user->image!=null) {
                $fname = md5(date('Y-m-d-h-i-s').rand(100000,999999)). '.' . $user->image->extension;
                $user->image->saveAs('../../frontend/web/uploads/' .  $fname);
                $user->image = $fname;
            }

        return $user->save()?$user->id:null;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    // public function upload()
    // {
    //     if ($this->validate(false)) {

    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

 
}
