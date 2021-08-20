<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\VisitorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ip_address') ?>

    <?= $form->field($model, 'vpn') ?>

    <?= $form->field($model, 'proxy') ?>

    <?= $form->field($model, 'tor') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'continent') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'time_zone') ?>

    <?php // echo $form->field($model, 'organisation') ?>

    <?php // echo $form->field($model, 'device') ?>

    <?php // echo $form->field($model, 'user_agent') ?>

    <?php // echo $form->field($model, 'browser') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'last_seen') ?>

    <?php // echo $form->field($model, 'visits') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'operation_system') ?>

    <?php // echo $form->field($model, 'screen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
