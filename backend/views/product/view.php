<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view col-12">

    <p>
        <?= Html::a('Update', ['update', 'slug' => $model->url], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set Image', ['set-image', 'slug' => $model->url], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Set Color', ['set-color', 'slug' => $model->url], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Set Form Factor', ['set-form-factor', 'slug' => $model->url], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete', ['delete', 'slug' => $model->url], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url',
            'price',
            'old_price',
            'description:ntext',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img($data->getImage(), ['width' => 300]);
                }
            ],
            [
                'format' => 'html',
                'label' => 'Form Factor',
                'value' => function ($data) {
                    return $data->formFactor->title;
                }
            ],
            [
                'format' => 'html',
                'label' => 'Colors',
                'value' => function ($data) {
                    foreach ($data->colors as $color) {
                        $colors .= ' ' . $color->title;
                    }
                    return $colors;
                }
            ],
            'created_at',
        ],
    ]) ?>

</div>
