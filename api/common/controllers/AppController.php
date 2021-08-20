<?php
namespace api\common\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class AppController extends ActiveController
{
    public $modelClass = '';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // SET AUTHENTICATION FOR CUSTOM REQUESTS(OPTIONAL)
        // $behaviors['authentificator']['only'] = ['create','update','delete','index','view'];
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'except' => ['login'],  // Except safe actions (optional)
            'authMethods' => [
                HttpBearerAuth::class,
            ],
        ];
        return $behaviors;
    }
}