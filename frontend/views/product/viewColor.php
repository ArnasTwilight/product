<?php

/** @var yii\web\View $this */
/** @var app\models\Color $model */

$this->title = 'Product | Color';
?>
<div class="color-view container">

    <div class="product-single opacity-bg d-flex">

        <div class="product-single__description p-2">

            <div class="product-single__title text-shadow">
                <?= $model->title ?>
            </div>

        </div>

    </div>

</div>
