<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Color $model */

$this->title = 'Update Color: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="color-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
