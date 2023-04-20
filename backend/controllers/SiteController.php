<?php

namespace backend\controllers;

use common\models\Color;
use common\models\FormFactor;
use common\models\LoginForm;
use common\models\Product;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'logout' => ['post'],
                    ],
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'products' => Product::countProduct(),
            'colors' => Color::countColor(),
            'formFactors' => FormFactor::countFormFactor(),
            'users' => User::countUser(),
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginBackend()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);

    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
