<?php

namespace backend\controllers;

use Yii;
use backend\models\Seo;
use backend\models\search\SeoSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * SeoController implements the CRUD actions for Seo model.
 */
class SeoController extends AppController
{


    /**
     * Lists all Seo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seo model.
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
     * Creates a new Seo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seo();

        if ($model->load(Yii::$app->request->post())) {
            $model->og_image = UploadedFile::getInstance($model, 'og_image');
            $model->icon = UploadedFile::getInstance($model, 'icon');
            if ($model->save()) {
                if ($model->upload()) {
                    $model->og_image = md5($model->og_image->baseName) . '.' . $model->og_image->extension;
                    $model->icon     = md5($model->icon->baseName) . '.' . $model->icon->extension;
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model->icon;

        if ($model->load(Yii::$app->request->post())) {
            $model->icon = UploadedFile::getInstance($model, 'icon');
            if ($model->upload()) {
                $image = md5($model->icon->baseName) . '.' . $model->icon->extension;
            }
            $model->icon = $image;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Seo model.
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
     * Finds the Seo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
