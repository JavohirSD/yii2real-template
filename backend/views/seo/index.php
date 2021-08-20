<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SEO Sozlamalari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-index">

 

    <p>
        <?= Html::a('Create Seo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_uz',
            'title_ru',
            'title_en',
            'description_uz:ntext',
            //'description_ru:ntext',
            //'description_en:ntext',
            //'icon',
            //'og_image',
            //'og_type',
            //'keywords:ntext',
            //'author',
            //'reply_email:email',
            //'google_verify:ntext',
            //'google_analytics:ntext',
            //'yandex_metrika:ntext',
            //'og_title_uz',
            //'og_title_ru',
            //'og_title_en',
            //'status',
            //'created_date',

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
