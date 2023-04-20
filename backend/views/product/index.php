<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <div class="col-lg-12">
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success mb-1']) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                //'url',
                'price',
                'old_price',
                'description:ntext',
                //'form_factor_id',
                //'created_at',
                [
                    'format' => 'html',
                    'label' => 'Image',
                    'value' => function ($data) {
                        return Html::img($data->getImage(), ['height' => 100]);
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'slug' => $model->url]);
                    }
                ],
            ],
        ]); ?>
    </div>

</div>
