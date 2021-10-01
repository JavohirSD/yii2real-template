<?php
namespace api\modules\v1\controllers;


use api\common\controllers\AppController;
use common\models\LoginForm;
use common\models\User;


class UserController extends AppController
{
    public $modelClass = User::class;

    public function actionTest(){
        return ['success'=>true];
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        // Disable captcha verification
        $model->scenario = LoginForm::SCENARIO_API_LOGIN;

        // Load post data to model and validate
        if ($model->load(\Yii::$app->request->post(), '') && ($token = $model->login(true)) ) {
            return ['access_token' => $token];
        } else {
            return $model;
        }
    }
}