<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Visitors */

$this->title = $model->ip_address;
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="visitors-view">


    <p>
        <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
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
            'ip_address',
            'vpn',
            'proxy',
            'tor',
            'city',
            'region',
            'country',
            'continent',
            'country_code',
            'latitude',
            'longitude',
            'time_zone',
            'organisation',
            'device',
            'user_agent',
            'browser',
            'created_date',
            'last_seen',
            'visits',
            [
                'attribute' => 'status',
                'value' =>  function($model){
                    if($model->status == 1) return 'Aktiv';
                    return 'To\'xtatilgan';
                },
            ],
            'operation_system',
            'screen',
        ],
    ]) ?>

</div>
