<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Visitors */

$this->title = 'Update Visitors: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visitors-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
