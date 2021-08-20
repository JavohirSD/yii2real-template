<?php

use yii\captcha\Captcha;
use yii\helpers\Html;
?>

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Admin </b>PANEL</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Tizimga kirish</p>

            <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

            <?= $form->field($model,'username', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>



            <div class="row">
                    <div class="col-8">
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'template' => '<div class="icheck-primary">{input}{label}</div>',
                            'labelOptions' => [
                                'class' => ''
                            ],
                            'uncheck' => null
                        ])->label('Eslab qolish') ?>
                    </div>

                <div class="col-xs-7">
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(),
                        [
                          'imageOptions' => ['height' => 60, 'width' => 190] ,
                          'options' => ['placeholder' => 'Harflarni yozing'],
                          'class' => 'form-control',
                          'template' => '
                          <div class="row">
                          <div class="col-md-6">
                          <div class="captcha_img">{image}</div>'
                            . '<a class="refreshcaptcha" href="#">'
                            . Html::img('/images/imageName.png',[]).'</a></div>'
                            . '<div class="col-md-6">{input}</div></div>',
                        ])->label(FALSE); ?>
                </div>
                    <!-- /.col -->

                        <?= Html::submitButton('Kirish', ['class' => 'btn btn-primary btn-block']) ?>

                    <!-- /.col -->

                </div>

            <?php \yii\bootstrap4\ActiveForm::end(); ?>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->


