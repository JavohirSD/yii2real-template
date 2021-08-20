<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */

// Load TinyMce and Image functions
$this->registerJsFile('/driver/assets/425ec420/tinymce.js',['depends' => [\yii\web\JqueryAsset::class]]);
?>
<!--- Image cropper modal start -->
<?= $this->render('../site/cropper'); ?>
<!--- Image cropper modal end -->

<div class="news-form">
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
                            <?= $form->field($model, 'anons_uz')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'description_uz')->textarea(['rows' => 14]) ?>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'anons_ru')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'description_ru')->textarea(['rows' => 14]) ?>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'anons_en')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'description_en')->textarea(['rows' => 14]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <?= Html::submitButton('<div class="fa fa-save"></div> Saqlash', ['class' => ['btn btn-success'],'style'=>'width:100%;']) ?>
                    </div>
                    <?= $form->field($model, 'status')->dropDownList([
                        1 => 'Aktiv holatda',
                        0 => 'Aktiv emas',
                    ]) ?>

                    <!-- LOAD CATEGORIES FROM DATABASE USING ArrayHelper() ---->
                    <?= $form->field($model, 'category_id')->dropDownList([
                        0 => 'Texnologiya',
                        1 => 'Sport',
                        2 => 'Madaniyat',
                        3 => 'Jamiyat',
                        4 => 'Iqtisodiyot',
                    ]) ?>

                    <!--- IMAGE  CROP  AND  FILE  SELECT  DIALOG BOX AREA START --->
                    <label class="control-label" for="SignupForm[image]">Rasm tanlash</label>
                    <img id="thumb" src="/frontend/web/uploads/<?php if($model->image!=null) echo $model->image; else echo 'holder.png'; ?>" width="270px" class="thumbr"/>
                    <?= $form->field($model, 'image')->fileInput(['style'=>'display:none'])->label(false) ?>
                    <input type="hidden" name="News[crop_image]" id="crop_image" value="">
                    <!--- IMAGE  CROP  AND  FILE  SELECT  DIALOG BOX AREA  END --->

                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
