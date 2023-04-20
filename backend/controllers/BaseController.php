<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * ColorController implements the CRUD actions for Color model.
 */
class BaseController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['logout', 'login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => [],
                            'allow' => true,
                            'matchCallback' => function ($rule, $action) {
//                                return !\Yii::$app->user->isGuest
//                                    && \Yii::$app->user->identity->roles === 'admin';
                                return \Yii::$app->user->identity->isAdmin;
                            },
                        ],
                    ],
                ],
            ]
        );
    }
}
