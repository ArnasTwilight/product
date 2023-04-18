<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form col-12">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->input('text', ['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'form_factor_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
