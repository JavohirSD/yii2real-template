<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VisitorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Saytga tashrif buyuruvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitors-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Yangi admin qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn'
                // you may configure additional properties here
            ],

//            'id',
            'ip_address',
            [
                'attribute' => 'Tarmoq',
                'format' => 'raw',
                'value' =>  function($model){
                    $text = "Ochiq";
                     if($model->vpn == 1)   $text="VPN";
                     if($model->tor == 1)   $text="TOR";
                     if($model->proxy == 1) $text="Proxy";
                     return $text;
                },
            ],
//            'proxy',
//            'tor',
            'city',
            //'region',
            'country',
            //'continent',
            //'country_code',
            //'latitude',
            //'longitude',
            //'time_zone',
            //'organisation',
            'device',
            //'user_agent',
            'browser',
            [
                'attribute' => 'created_date',
                'header' => '<a href="/driver/visitors/index?sort=created_date">Yaratilgan<br>sana</a> ',
                'value' =>  function($model){
                    return date("d.m.Y H:i:s", strtotime($model->created_date));

                },
            ],
            [
                'attribute' => 'last_seen',
                'header' => '<a href="/driver/visitors/index?sort=last_seen">So’ngi<br>faollik</a> ',
                'value' =>  function($model){
                    return date("d.m.Y H:i:s", strtotime($model->last_seen));

                },
            ],
            [
                'attribute' => 'visits',
                'header' => '<a href="/driver/visitors/index?sort=visits">Tashriflar<br>soni</a> ',
                'value' =>  function($model){
                    return $model->visits;

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
                      <a class="dropdown-item text-success" href="/driver/visitors/status?id='.$model->id.'&s=0">Aktiv holatda</a>
                      <a class="dropdown-item text-danger"  href="/driver/visitors/status?id='.$model->id.'&s=1">Aktiv emas</a>
                    </div>
                  </div>';
                },
            ],
            //'operation_system',
            //'screen',

             ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'delete' => function ($url) {
                        return Html::a('<div class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></div>',$url, ['title' => 'Delete', 'data-pjax' => '0',]);
                    },
                    'view' => function ($url) {
                        return Html::a('<div class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></div>',$url, ['title' => 'View', 'data-pjax' => '0',]);
                    },
                ],
             ],

        ],
    ]); ?>
</div>
<?php
$scr = <<<JS
        $( document ).ready(function() {
            var rows = document.getElementsByTagName("table")[0].rows;
            rows[1].cells[1].innerHTML = '<div class="btn btn-danger" id="delete_selected"><div class="glyphicon glyphicon-trash" data-confirm="Are you sure you want to delete this item?"></div></div>'; 
            $('#delete_selected').click(function (){
               var keys = $('.grid-view').yiiGridView('getSelectedRows');
               if(keys.length < 1) {alert('O’chirish uchun maydon tanlanmadi !'); return false }
                $.ajax({
                    type: "POST",
                    url: "/driver/visitors/remover",
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
JS;
$this->registerJs($scr);
?>

