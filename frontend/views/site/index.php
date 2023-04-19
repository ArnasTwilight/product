<?php

/** @var yii\web\View $this */

$this->title = 'Main';
?>
<div class="site-index container">
    <div class="row">

        <div class="container main-center text-center text-white">
            <h1 class="text-center main-text text-opacity-75 mt-0 mb-4">
                Home for your PC starts here
            </h1>

            <a class="opacity-bg main-link text-decoration-none text-white"
               href="<?= \yii\helpers\Url::toRoute(['/product']) ?>">Go to choose!</a>
        </div>

    </div>
</div>
