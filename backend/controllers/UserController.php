<?php

namespace backend\controllers;

use frontend\models\SignupForm;
use Yii;
use common\models\User;
use backend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AppController
{
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->password = $model->password_hash;

            return $this->redirect(['view', 'id' => $model->signup()]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        $old_password = $model->password_hash;
        if ($model->load(Yii::$app->request->post())) {

            $model->username = Yii::$app->request->post()['User']['username'];
            $model->email    = Yii::$app->request->post()['User']['email'];
            $model->status   = Yii::$app->request->post()['User']['status'];
            $password = Yii::$app->security->generatePasswordHash(Yii::$app->request->post()['User']['password_hash']);
            $model->password_hash = $old_password==Yii::$app->request->post()['User']['password_hash']?$old_password:$password;


            $model->image    = UploadedFile::getInstance($model, 'image');
            if ( $model->image and $model->upload() ) {
                 $image = md5($model->image->baseName).'.'.$model->image->extension;
                 // file is uploaded successfully
            }

            $model->image = $model->crop_image==null?$image:$model->crop_image;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionStatus($id,$s){
        $model = User::findOne($id);
        $model->status = $s==0?0:10;
        $model->save();
        return $this->redirect(['index']);
    }


}
