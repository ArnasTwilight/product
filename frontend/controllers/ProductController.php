<?php

namespace frontend\controllers;

use common\models\Color;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' =>  Product::find()->orderBy('price DESC')->with(['colors', 'formFactor']),
            'pagination' => [
                'pageSize' => 2,
                'pageSizeParam' => false
            ],
            'sort' => [
                'defaultOrder' => [
                    'price' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'products' => $dataProvider->getModels(),
            'pages' => $dataProvider->getPagination(),
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $url URL
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        return $this->render('view', [
            'model' => $this->findModel($slug),
        ]);
    }

    public function actionFormFactor($slug, $id)
    {
        return $this->render('viewFormFactor', [
            'model' => $this->findModel($slug)->formFactor,
        ]);
    }

    public function actionColor($slug, $id)
    {
        return $this->render('viewColor', [
            'model' => Color::findOne(['id' => $id]),
        ]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $url URL
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slug)
    {
        if (($model = Product::findOne(['url' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
