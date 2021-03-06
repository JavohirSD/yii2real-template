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
        'template' => "<tr><th style='width: 25%;'>{label}</th><td>{value}.</td></tr>",
        'attributes' => [
            [
                'attribute' => 'image',
                'format'    => 'raw',
                'value' =>  function($model){
                    $image = $model->image??'holder.png';
                    return "<a href='/uploads/".$image."' target='_blank'>
                           <img src='/uploads/".$image."' width='200'></a>";
                },
            ],
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

        ],
    ]) ?>
</div>
 