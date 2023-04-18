<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FormFactor $model */

$this->title = 'Update Form Factor: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Form Factors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="form-factor-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
