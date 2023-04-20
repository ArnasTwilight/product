<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>


        <?php if ($model->status === 0): ?>
            <?= Html::a('Destroy', ['destroy', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete PERMANENTLY this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php else: ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-warning',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            [
                'format' => 'html',
                'label' => 'status',
                'value' => function ($model) {
                    switch ($model->status){
                        case 0:
                            $status = '<i class="text-danger">Deleted</i>';
                            break;
                        case 9:
                            $status = '<i class="text-warning">Inactive</i>';
                            break;
                        case 10:
                            $status = '<i class="text-success">Active</i>';
                            break;
                    }
                    return $status;
                }
            ],
            'roles',
        ],
    ]) ?>

</div>
