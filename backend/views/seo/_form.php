<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Seo */
/* @var $form yii\widgets\ActiveForm */
$scr = <<<JS
$( document ).ready(function() {
         $('#thumb1').click(function(){ $('#seo-og_image').trigger('click'); });
         $('#thumb2').click(function(){ $('#seo-icon').trigger('click'); });
         
        $(document).on('change', '#seo-og_image', function() {
         thumb1.src=URL.createObjectURL(event.target.files[0]);
      });
            
         $(document).on('change', '#seo-icon', function() {
         thumb2.src=URL.createObjectURL(event.target.files[0]);
      });
});
JS;
$this->registerJs($scr);
?>

<div class="seo-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3"></li>
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">O'zbekcha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Русский</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">English</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                            <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'og_title_uz')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'description_uz')->textarea(['rows' => 3]) ?>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'og_title_ru')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'description_ru')->textarea(['rows' => 3]) ?>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'og_title_en')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'description_en')->textarea(['rows' => 3]) ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'og_type')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'google_verify')->textarea(['rows' => 1]) ?>
                    <?= $form->field($model, 'yandex_verify')->textarea(['rows' => 1]) ?>
                    <?= $form->field($model, 'keywords')->textarea(['rows' => 2]) ?>
                    <?= $form->field($model, 'google_analytics')->textarea(['rows' => 4]) ?>
                    <?= $form->field($model, 'yandex_metrika')->textarea(['rows' => 4]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <?= Html::submitButton('Saqlash', ['class' => ['btn btn-success'],'style'=>'width:100%;']) ?>
                    </div>

                    <?= $form->field($model, 'status')->dropDownList([
                        1 => 'Aktiv holatda',
                        0 => 'Aktiv emas',
                    ]) ?>

                    <?= $form->field($model, 'reply_email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

                    <label class="control-label" for="Seo[icon]">Rasm1 tanlash</label>
                    <img id="thumb2" src="/uploads/<?php if($model->icon!=null) echo $model->icon; else echo 'holder.png'; ?>" width="270px" class="thumbr"/>
                    <?= $form->field($model, 'icon')->fileInput(['style'=>'display:none'])->label(false) ?>

<!--                    <label class="control-label" for="Seo[og_image]">Rasm1 tanlash</label>-->
<!--                    <img id="thumb1" src="/frontend/web/uploads/--><?php //if($model->og_image!=null) echo $model->og_image; else echo 'holder.png'; ?><!--" width="270px" class="thumbr"/>-->
<!--                    --><?//= $form->field($model, 'og_image')->fileInput(['style'=>'display:none'])->label(false) ?>

                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
