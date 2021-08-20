<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SeoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_uz') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'description_uz') ?>

    <?php // echo $form->field($model, 'description_ru') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'og_image') ?>

    <?php // echo $form->field($model, 'og_type') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'reply_email') ?>

    <?php // echo $form->field($model, 'google_verify') ?>

    <?php // echo $form->field($model, 'google_analytics') ?>

    <?php // echo $form->field($model, 'yandex_metrika') ?>

    <?php // echo $form->field($model, 'og_title_uz') ?>

    <?php // echo $form->field($model, 'og_title_ru') ?>

    <?php // echo $form->field($model, 'og_title_en') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
