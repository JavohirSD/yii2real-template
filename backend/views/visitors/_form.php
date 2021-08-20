<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Visitors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vpn')->textInput() ?>

    <?= $form->field($model, 'proxy')->textInput() ?>

    <?= $form->field($model, 'tor')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'continent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_zone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organisation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'browser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'last_seen')->textInput() ?>

    <?= $form->field($model, 'visits')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'operation_system')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'screen')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
