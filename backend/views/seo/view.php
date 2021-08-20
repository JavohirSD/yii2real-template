<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Seo */

$this->title ="SEO Sozlamalari:";
$this->params['breadcrumbs'][] = ['label' => 'Seos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="seo-view">

    

    <p>
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title_uz',
            'title_ru',
            'title_en',
            'description_uz:ntext',
            'description_ru:ntext',
            'description_en:ntext',
            'icon',
            'og_image',
            'og_type',
            'keywords:ntext',
            'author',
            'reply_email:email',
            'google_verify:ntext',
            'yandex_verify:ntext',
            'google_analytics:ntext',
            'yandex_metrika:ntext',
            'og_title_uz',
            'og_title_ru',
            'og_title_en',
            'status',
            'created_date',
        ],
    ]) ?>

</div>
