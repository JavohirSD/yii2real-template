<?php

namespace backend\controllers;
use Yii;
use backend\models\Visitors;
use backend\models\search\VisitorsSearch;
use yii\web\NotFoundHttpException;

/**
 * VisitorsController implements the CRUD actions for Visitors model.
 */
class VisitorsController extends AppController
{


    /**
     * Lists all Visitors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisitorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visitors model.
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
     * Creates a new Visitors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Visitors();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Visitors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Visitors model.
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
     * Finds the Visitors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Visitors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Visitors::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionStatus($id,$s){
        $model = Visitors::findOne($id);
        $model->status = $s==0?1:0;
        $model->save();
        return $this->redirect(['visitors/index']);
    }

    public function actionGetstat(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Yii::$app->db->createCommand("
        SELECT SUM(visits) AS visits FROM visitors
        WHERE last_seen BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now()
        GROUP BY DATE_FORMAT(last_seen, '%Y-%m-%d') ASC
        ")->queryAll();
        return $model;
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

}
