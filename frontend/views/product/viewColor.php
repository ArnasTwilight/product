<?php

/** @var yii\web\View $this */
/** @var common\models\Color $model */

$this->title = 'Product | Color';
?>
<div class="color-view container">

    <div class="product-single opacity-bg d-flex">

        <div class="product-single__description p-2">

            <div class="product-single__title single-item">
                <div class="square-color <?= $model->title ?>"></div><?= $model->title ?>
            </div>

        </div>

    </div>

</div>
