<?php

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <div class="col-lg-4">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
