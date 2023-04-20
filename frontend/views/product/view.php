<?php

/** @var yii\web\View $this */

/** @var common\models\Product $model */

use yii\helpers\Html;
use frontend\assets\BackendAsset;
use yii\helpers\Url;

$backend = BackendAsset::register($this);
$this->title = 'Product | View';
?>
<div class="product-view container">

    <div class="product-single d-flex">

        <div class="product-single__image">
            <?= Html::img($backend->baseUrl . '/' . $model->image, ['alt' => 'product image']) ?>
        </div>

        <div class="product-single__description p-2">

            <div class="product-single__title">
                <?= $model->title ?>
            </div>

            <div class="product-single__price">
                <?= $model->price . '$' ?>
            </div>

            <div class="product-single__text mt-2">
                <details open>
                    <summary>Description</summary>
                    <p class="m-0">
                        <?= $model->description ?>
                    </p>
                </details>
            </div>

            <div class="product-single__modifier mt-2 text-mod">

                <p class="m-0">
                    Form Factor:
                    <a href="<?= Url::toRoute(['product/form-factor',  'slug' => $model->url, 'id' => $model->formFactor->id]) ?>"
                       class="mod-link text-decoration-none"><?= $model->formFactor->title ?></a>
                </p>

                <div class="d-flex">
                    <p class="m-0"> Colors: </p>
                    <ul class="colors d-flex p-0">
                        <?php foreach ($model->colors as $color): ?>
                            <li class="colors__item">
                                <div class="square-color <?= $color->title ?>"></div>
                                <a href="<?= Url::toRoute(['product/color', 'slug' => $model->url, 'id' => $color->id]) ?>"
                                   class="mod-link text-decoration-none"><?= $color->title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

        </div>

    </div>

</div>
