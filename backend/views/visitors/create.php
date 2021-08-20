<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Visitors */

$this->title = 'Create Visitors';
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitors-create">
 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
