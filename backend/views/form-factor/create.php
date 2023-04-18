<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FormFactor $model */

$this->title = 'Create Form Factor';
$this->params['breadcrumbs'][] = ['label' => 'Form Factors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-factor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
