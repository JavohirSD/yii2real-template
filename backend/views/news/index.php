<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yangiliklar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <p>
        <?= Html::a('<i class="fa fa-fw fa-plus"></i> Yangilik qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns' => [
            ['class'  => 'yii\grid\SerialColumn'],
            [ 'class' => 'yii\grid\CheckboxColumn'],

//            'id',
            'title_uz',
            [
                'attribute' => 'anons_uz',
                'value' =>  function($model){
                    return substr($model->anons_uz,0,70);
                },
            ],
            [
                'attribute' => 'category_id',
                'value' =>  function($model){
                    return 'Texnologiya';
                },
            ],
            [
                'attribute' => 'user_id',
                'value' =>  function($model){
                    return \common\models\User::findOne(['id'=>$model->user_id])['username'];
                },
            ],
            'created_date',
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
                        <a class="dropdown-item text-success" href="/driver/news/status?id='.$model->id.'&s=0">Aktiv holatda</a>
                        <a class="dropdown-item text-danger"  href="/driver/news/status?id='.$model->id.'&s=1">Aktiv emas</a>
                    </div>
                </div>';
              },
          ],

          ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
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

<?php  $scr = <<<JS
  $( document ).ready(function() {
      var rows = document.getElementsByTagName('table')[0].rows;
      rows[1].cells[1].innerHTML = '<div class="btn btn-danger" id="delete_selected"><div class="glyphicon glyphicon-trash"></div></div>';
         $('#delete_selected').click(function (){
            var keys = $('.grid-view').yiiGridView('getSelectedRows');
            if(keys.length < 1) {alert('O’chirish uchun maydon tanlanmadi !'); return false }
                $.ajax({
                    type: "POST",
                    url: "/driver/news/remover",
                    data: {ids: keys},
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }); 
       }); 
JS; $this->registerJs($scr); ?>