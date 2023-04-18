<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var app\models\Product $selectedColor */
/** @var app\models\Product $colors */

$this->title = 'Update Product: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'url' => $model->url]];
$this->params['breadcrumbs'][] = 'Set Color';
?>
<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6">
        <?= Html::dropDownList('colors', $selectedColor, $colors, ['class' => 'form-control', 'multiple' => true]) ?>
    </div>

    <div class="form-group col-12">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success mt-1']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
