<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Seo */

$this->title = 'SEO Sozlamalari:';
$this->params['breadcrumbs'][] = ['label' => 'Seos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seo-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
