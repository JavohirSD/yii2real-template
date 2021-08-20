<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tizim foydalanuvchilari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


    <p>
        <?= Html::a('Yangi admin qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
           // 'auth_key',
           // 'password_hash',
          //  'password_reset_token',
            'email:email',
            [
                'attribute' => 'created_at',
                'value' =>  function($model){
                    return date("d.m.Y H:i:s", $model->created_at);
                },
            ],
            [
                'attribute' => 'updated_at',
                'value' =>  function($model){
                    return date("d.m.Y H:i:s", $model->created_at);
                },
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' =>  function($model){
                    $btn  = $model->status==0?'danger':'success';
                    $txt  = $model->status==0?'Inaktiv':'Aktiv';
                    return '<div class="input-group-prepend">
                    <button type="button" class="btn btn-'.$btn.' dropdown-toggle" data-toggle="dropdown">
                      '.$txt.'
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item text-success" href="/driver/user/status?id='.$model->id.'&s=1">Aktiv holatda</a>
                      <a class="dropdown-item text-danger"  href="/driver/user/status?id='.$model->id.'&s=0">Aktiv emas</a>
                    </div>
                  </div>';
                },
            ],
           ['class' => 'yii\grid\ActionColumn',
                'template' => '{download} {view} {update} {delete}',
                'buttons' => [
                    'delete' => function ($url) {
                        return Html::a('<div class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></div>',$url, ['title' => 'Delete', 'data-pjax' => '0',]);
                    },
                    'update' => function ($url) {
                        return Html::a('<div class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></div>',$url, ['title' => 'Update', 'data-pjax' => '0',]);
                    },
                    'view' => function ($url) {
                        return Html::a('<div class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></div>',$url, ['title' => 'View', 'data-pjax' => '0',]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>