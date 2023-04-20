<?php

use common\models\User;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="col-lg-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
                'email:email',
                [
                    'format' => 'html',
                    'label' => 'status',
                    'value' => function ($data) {
                        switch ($data->status){
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
                //'created_at',
                //'updated_at',
                //'verification_token',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, User $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

</div>
