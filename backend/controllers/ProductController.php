<?php

namespace backend\controllers;

use common\models\Color;
use common\models\FormFactor;
use common\models\ImageUpload;
use common\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
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
            'query' => Product::find(),
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => [
                    'price' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
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

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'slug' => $model->url]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $url URL
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($slug)
    {
        $model = $this->findModel($slug);

        $model->updated_at = date('Y-m-d H:i:s');

        if ($this->request->isPost) {
            $model->old_price = $model->oldAttributes['price'];

            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'slug' => $model->url]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $url URL
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($slug)
    {
        $image = new ImageUpload;
        $model = $this->findModel($slug);

        $image->deleteCurrentImage($model->image);
        $model->delete();

        return $this->redirect(['index']);
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

    public function actionSetImage($slug)
    {
        $model = new ImageUpload;

        if ($this->request->isPost) {
            $product = $this->findModel($slug);
            $file = UploadedFile::getInstance($model, 'image');

            if ($product->saveImage($model->uploadFile($file, $product->image))) {
                return $this->redirect(['view', 'slug' => $product->url]);
            }
        }

        return $this->render('image', ['model' => $model]);
    }

    public function actionSetColor($slug)
    {
        $product = $this->findModel($slug);
        $selectedColor = $product->getSelectedColors();
        $colors = ArrayHelper::map(Color::find()->all(), 'id', 'title');

        if (Yii::$app->request->isPost) {
            $colors = Yii::$app->request->post('colors');

            if (empty($colors)) {
                $product->deleteCurrentColors();
            } else {
                $product->saveColors($colors);
            }

            return $this->redirect(['view', 'slug' => $product->url]);
        }

        return $this->render('color', [
            'model' => $product,
            'selectedColor' => $selectedColor,
            'colors' => $colors,
        ]);
    }

    public function actionSetFormFactor($slug)
    {
        $product = $this->findModel($slug);
        $selectedFormFactor = $product->form_factor_id;
        $formFactors = ArrayHelper::map(FormFactor::find()->all(), 'id', 'title');

        if (Yii::$app->request->isPost) {
            $formFactor = Yii::$app->request->post('formFactor');
            $product->saveFormFactor($formFactor);

            return $this->redirect(['view', 'slug' => $product->url]);
        }

        return $this->render('formfactor', [
            'model' => $product,
            'selectedFormFactor' => $selectedFormFactor,
            'formFactors' => $formFactors,
        ]);
    }
}
