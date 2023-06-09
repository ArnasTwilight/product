<?php

/** @var yii\web\View $this */
/** @var common\models\Product $products */

/** @var common\models\Product $pages */

use frontend\assets\BackendAsset;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$backend = BackendAsset::register($this);
$this->title = 'Products';
?>
<div class="product-index container">

    <?= LinkPager::widget([
        'pagination' => $pages,
        'options' => [
            'class' => 'pagination'
        ],
    ]); ?>

    <div class="products-container">

        <?php foreach ($products as $product): ?>
            <div class="product mt-3">
                <div class="product__image">

                    <a href="<?= Url::toRoute(['product/view', 'slug' => $product->url]) ?>"
                       class="text-decoration-none">
                        <?= Html::img($backend->baseUrl . '/' . $product->image, ['alt' => 'product image']) ?>
                    </a>

                </div>

                <div class="product__title mt-2">
                    <a href="<?= Url::toRoute(['product/view', 'slug' => $product->url]) ?>"
                       class="text-decoration-none"><?= $product->title ?></a>
                </div>

                <div class="product__price">
                    <?= $product->price . '$' ?>
                </div>

                <?php if (!empty($product->formFactor->title)): ?>
                    <p class="m-0">
                        Form Factor:
                        <a href="<?= Url::toRoute(['product/form-factor', 'slug' => $product->url, 'id' => $product->formFactor->id]) ?>"
                           class="mod-link text-decoration-none"><?= $product->formFactor->title ?></a>
                    </p>
                <?php endif; ?>

                <?php if (!empty($product->colors)): ?>
                    <p class="m-0">
                        Colors:
                    </p>

                    <ul class="index-colors p-1">
                        <?php foreach ($product->colors as $color): ?>
                            <li class="index-colors__item">
                                <div class="square-color <?= $color->title ?>"></div>
                                <a href="<?= Url::toRoute(['product/color', 'slug' => $product->url, 'id' => $color->id]) ?>"
                                   class="mod-link text-decoration-none"><?= $color->title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>

</div>
