<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->title_uz;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <p>
        <?= Html::a('<i class="fa fa-fw fa-home"></i>', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<i class="fa fa-fw fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary ']) ?>
        <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title_uz',
            'title_ru',
            'title_en',
            [
                'attribute' => 'description_uz',
                'value' =>  function($model){
                    return strip_tags(substr($model->anons_uz,0,250));
                },
            ],
            [
                'attribute' => 'description_ru',
                'value' =>  function($model){
                    return strip_tags(substr($model->anons_uz,0,250));
                },
            ],
            [
                'attribute' => 'description_en',
                'value' =>  function($model){
                    return strip_tags(substr($model->anons_uz,0,250));
                },
            ],
            'anons_uz:ntext',
            'anons_ru:ntext',
            'anons_en:ntext',
            'category_id',
            'user_id',
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
            'created_date',
            'image',
        ],
    ]) ?>
</div>

<?php
$scr = <<<JS
$( document ).ready(function() {
          $("a.btn-success").hover(function(){ 
                $(this).animate({width: "150px"},200,function (){
                     $(this).append(" Yangi yaratish");
                });
              }, function(){    
               $(this).stop();
               $(this).html( $(this).html().replace(/Yangi yaratish/g, '') );
               $(this).animate({width: "60px"},200);
            });
          
           $("a.btn-primary").hover(function(){ 
                $(this).animate({width: "150px"},200,function (){
                     $(this).append(" Tahrirlash");
                });
              }, function(){    
               $(this).stop();
               $(this).html( $(this).html().replace(/Tahrirlash/g, '') );
               $(this).animate({width: "60px"},200);
            });
           
            $("a.btn-danger").hover(function(){ 
                $(this).animate({width: "150px"},200,function (){
                     $(this).append(" O`chirish");
                });
              }, function(){    
               $(this).stop();
               $(this).html( $(this).html().replace(/O`chirish/g, '') );
               $(this).animate({width: "60px"},200);
            });
            
             $("a.btn-info").hover(function(){ 
                $(this).animate({width: "170px"},200,function (){
                     $(this).append(" Menyuga qaytish");
                });
              }, function(){    
               $(this).stop();
               $(this).html( $(this).html().replace(/Menyuga qaytish/g, '') );
               $(this).animate({width: "60px"},200);
            });
});
JS;
$this->registerJs($scr);
?>