<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// Load TinyMce and Image functions
$this->registerJsFile('/driver/assets/425ec420/tinymce.js',['depends' => [\yii\web\JqueryAsset::class]]);

$scr = <<<JS
$( document ).ready(function() {
         $('#thumb').click(function(){ $('#signupform-image, #user-image').trigger('click'); });
         $(document).on('change', '#signupform-image, #user-image', function() {
         thumb.src=URL.createObjectURL(event.target.files[0]);
   });
         $("input[type='hidden'][name='SignupForm[image]']").remove();
});
JS;
$this->registerJs($scr);
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($model, 'username')->textInput()->label('Foydalanuvchi logini') ?>
                    <?= $form->field($model, 'password_hash')->passwordInput(['placeholder'=>'* * * * * * * * * *','value'=>''])->label('Foydalanuvchi paroli') ?>
                    <?= $form->field($model, 'email')->textInput()->label('Email manzilni kiriting') ?>
                    <?= $form->field($model, 'description')->textarea(['rows'=>10])->label('Foydalanuvchi haqida malumot') ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success','style'=>'width:100%']) ?>
                    </div>

                    <?= $form->field($model, 'status')->dropDownList([
                        10 => 'Aktiv holatda',
                        9 => 'Aktiv emas',
                    ])->label('Admin holati') ?>

                    <label class="control-label" for="SignupForm[image]">Rasm tanlash</label>
                    <img id="thumb" src="/uploads/<?php if($model->image!=null) echo $model->image; else echo 'holder.png'; ?>" width="270px" class="thumbr"/>
                    <?= $form->field($model, 'image')->fileInput(['style'=>'display:none'])->label(false) ?>
                    <input type="hidden" name="<?=Yii::$app->controller->action->id=='create'?'SignupForm[crop_image]':'User[crop_image]'?>" id="crop_image" value="">


                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?= $this->render('../site/cropper'); ?>
