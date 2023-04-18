<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var app\models\Product $selectedFormFactor */
/** @var app\models\Product $formFactors */

$this->title = 'Update Product: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'url' => $model->url]];
$this->params['breadcrumbs'][] = 'Set Form Factor';
?>
<div class="product-update col-12">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6">
        <?= Html::dropDownList('formFactor', $selectedFormFactor, $formFactors, ['class' => 'form-control', 'multiple' => false]) ?>
    </div>

    <div class="form-group col-12">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success mt-1']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
