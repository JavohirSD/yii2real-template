<?php

namespace backend\controllers;

use Yii;
use backend\models\News;
use backend\models\search\NewsSearch;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends AppController
{


    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            $model->image   = $model->crop_image==null?UploadedFile::getInstance($model, 'image'):$model->crop_image;

            if ($model->crop_image==null) {
                $model->image = $model->upload();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        if ($model->load(Yii::$app->request->post())) {
            $model->image =  UploadedFile::getInstance($model, 'image');
            if( $model->image && $model->crop_image==null ){
                $image = $model->upload();
            }
            $model->image = $model->crop_image==null?$image:$model->crop_image;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       // $this->findModel($id)->delete();
         $model = $this->findModel($id);
         if(unlink(Yii::getAlias('@frontend') . '/web/uploads/' . $model->image)) {
           $model->delete();
         }
        return $this->redirect(['index']);
    }



    public function actionRmfile(){
        $id = Yii::$app->request->post()['id'];
        $model = $this->findModel($id);
        $file_path = Yii::getAlias('@frontend') . '/web/uploads/' . $model->image;
            if(file_exists($file_path)) {
                if(unlink($file_path)) {
                    $model->delete();
                }
            }
        return $model->save();
    }

    public function actionRemover(){
        $ids = Yii::$app->request->post()['ids'];
        if($ids){
            for($i=0; $i<count($ids); $i++){
                $this->findModel($ids[$i])->delete();
                // $model = $this->findModel($ids[$i]);
                // if(unlink(Yii::getAlias('@frontend') . '/web/uploads/' . $model->image)) {
                //  $model->delete();
                //  }
            } return 'success';
        } return 'error';
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionStatus($id,$s){
            $model = News::findOne($id);
            $model->status = $s==0?1:0;
            $model->save();
        return $this->redirect(['index']);
    }

}
