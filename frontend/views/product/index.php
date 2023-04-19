<?php

/** @var yii\web\View $this */
/** @var app\models\Product $products */

use yii\helpers\Html;
use frontend\assets\BackendAsset;
use yii\helpers\Url;

$backend = BackendAsset::register($this);
$this->title = 'Products';
?>
<div class="product-index container">

    <div class="products-container">

        <?php foreach ($products as $product):?>
        <div class="product mt-3">
            <div class="product__image">

                <a href="<?= Url::toRoute(['product/view', 'slug' => $product->url]) ?>" class="text-decoration-none">
                    <?= Html::img($backend->baseUrl . '/' . $product->image, ['alt' => 'product image']) ?>
                </a>

            </div>

            <div class="product__title mt-2 text-shadow">
                <a href="<?= Url::toRoute(['product/view', 'slug' => $product->url]) ?>" class="text-decoration-none"><?= $product->title ?></a>
            </div>

            <div class="product__price text-shadow">
                <?= $product->price . '$' ?>
            </div>
        </div>
        <?php endforeach;?>

    </div>

</div>
