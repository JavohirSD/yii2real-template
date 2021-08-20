<?php
namespace api\modules\v1\controllers;


use api\common\controllers\AppController;
use backend\models\News;


class NewsController extends AppController
{
    public $modelClass = News::class;

    // Change API's default actions like - create,update,view,index,delete
    // https://stackoverflow.com/questions/36300972/yii2-rest-api-actions-in-activecontroller

    public function actionTest(){
        return ['success'=>true];
    }
}