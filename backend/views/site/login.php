<?php
use yii\helpers\Html;
?>
<div class="card col-lg-6 m-auto">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],

            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-2']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-2']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => '<div class="icheck-primary">{input}{label}</div>',
            'labelOptions' => [
                'class' => ''
            ],
            'uncheck' => null
        ]) ?>

        <div class="row">
            <div class="d-flex">
                <div class="m-auto">
                    <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>
        </div>

        <?php \yii\bootstrap4\ActiveForm::end(); ?>
    </div>
    <!-- /.login-card-body -->
</div>