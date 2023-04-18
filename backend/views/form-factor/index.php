<?php

use app\models\FormFactor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Form Factors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-factor-index">
    <div class="col-lg-12">
        <?= Html::a('Create Form Factor', ['create'], ['class' => 'btn btn-success mb-1']) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, FormFactor $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
