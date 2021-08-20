<?php
namespace backend\controllers;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $si_prefix = array('B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB');
    public $base = 1024;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['captcha'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['login','upload' ],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','error','upload','crop','language'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],

                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'minLength' => 5, // минимальное количество символов
                'maxLength' => 5, // максимальное
                'offset' => 0, // расстояние между символами (можно отрицательное)
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function beforeAction($action)
    {
        if ($this->action->id == 'crop') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $bytes = disk_free_space("/");
        $class = min((int)log($bytes, $this->base), count($this->si_prefix) - 1);
        $disk_size = sprintf('%1.2f', $bytes / pow($this->base, $class)) . ' ' . $this->si_prefix[$class];
        $directory = Yii::getAlias('@rootdir');
        $size = 0;
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
            $size+=$file->getSize();
        }
        $class = min((int)log($size , $this->base) , count($this->si_prefix) - 1);
        $folder_size = sprintf('%1.2f' , $size / pow($this->base,$class)) . ' ' . $this->si_prefix[$class];

        $percent = number_format((float) (($size / $bytes) *100), 2, '.', '')." %";

        return $this->render('index',[
            'disk_size'   => $disk_size,
            'folder_size' => $folder_size,
            'percent_size'=> $percent,
        ]);
    }



    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionUpload()
    {
        reset ($_FILES);
        $temp  = current($_FILES);
        $check = getimagesize($temp["tmp_name"]);
        $ext   = pathinfo($temp['name'], PATHINFO_EXTENSION);

        // MOVING UPLOADED FILE
        if($check!==false) {
            $stamp = base64_encode(date("Y-m-d h:i:s"));
            if(move_uploaded_file($temp['tmp_name'], "../../frontend/web/uploads/" . $stamp . "." . $ext)){
                return "{ \"location\" : \"uploads/" . $stamp . ".jpg\"}";
            }
        }
        return false;
    }



    public function actionCrop(){
        Yii::$app->controller->enableCsrfValidation = false;
        if(Yii::$app->request->post()){
            $name = date('sih').rand(1000,9999).time();
            $img  = $_POST['imgBase64'];
            if(strpos($img, "image/jpeg")){
                $extension = "jpg";
                $mimetype  = "image/jpeg";
            }

            if(strpos($img, "image/png")){
                $extension = "png";
                $mimetype  = "image/png";
            }

            $img  = str_replace('data:'.$mimetype.';base64,', '', $img);
            $data = base64_decode($img);
            $file = Yii::getAlias('@frontend') . '/web/uploads/'  .$name.'.'.$extension;
            file_put_contents($file, $data);

            // File injection validating
            $info = getimagesize($file);
            $validExtensions = ['png', 'jpeg', 'jpg', 'gif'];
            $ext = ltrim($info['mime'], 'image/');
            if (
                $info[0] > 32 &&
                $info[1] > 32 &&
                filesize($file) < 8000000 &&
                in_array(strtolower($ext), $validExtensions)
            ) {
                return $name.'.'.$extension;
            }
            unlink($file);
            return 'invalid_file';
        }
        return 'forbidden';
    }

     public function actionLanguage(){
        // Read language arrays from /messages
        $current1 = include Yii::getAlias('@frontend') . '/messages/uz/yii.php';
        $current2 = include Yii::getAlias('@frontend') . '/messages/ru/yii.php';
        $current3 = include Yii::getAlias('@frontend') . '/messages/en/yii.php';
        $source   = include Yii::getAlias('@frontend') . '/messages/oz/yii.php';

        // sort arrays by key value
         ksort($current1);
         ksort($current2);
         ksort($current3);
         ksort($source);

        if (Yii::$app->request->post()) {
             $data1 = Yii::$app->request->post()['uz'];
             $data2 = Yii::$app->request->post()['ru'];
             $data3 = Yii::$app->request->post()['en'];

             // Combining array values with source language values
             $data1 = array_combine($source,$data1);
             $data2 = array_combine($source,$data2);
             $data3 = array_combine($source,$data3);

             // Initial part of yii.php files
             $text1 = $text2 = $text3 = "<?php"." return [ \n";

             // Appending array keys and values to text
            foreach ($data1 as $x => $x_value) {
                $text1 .= "    \"".$x."\" => \"".$x_value."\", \n";
            }
            foreach ($data2 as $x => $x_value) {
                $text2 .= "    \"".$x."\" => \"".$x_value."\", \n";
            }
            foreach ($data3 as $x => $x_value) {
                $text3 .= "    \"".$x."\" => \"".$x_value."\", \n";
            }

            // Writing complete array consisted text to php files
            file_put_contents(Yii::getAlias('@frontend') . "/messages/uz/yii.php",$text1." ];");
            file_put_contents(Yii::getAlias('@frontend') . "/messages/ru/yii.php",$text2." ];");
            file_put_contents(Yii::getAlias('@frontend') . "/messages/en/yii.php",$text3." ];");
            return $this->render('language',[
                'current1' =>  $data1,
                'current2' =>  $data2,
                'current3' =>  $data3,
            ]);
        }

        return $this->render('language',[
             'current1' => $current1,
             'current2' => $current2,
             'current3' => $current3,
        ]);
    }


}
