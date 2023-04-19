<?php

$this->title = 'Main';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <a href="<?= \yii\helpers\Url::toRoute(['product/index']) ?>">
                <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Products',
                    'number' => $products,
                    'icon' => 'fas fa-cart-arrow-down',
                    'theme' => 'gradient-info'
                ]) ?>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <a href="<?= \yii\helpers\Url::toRoute(['color/index']) ?>">
                <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Colors',
                    'number' => $colors,
                    'icon' => 'fas fa-paint-brush',
                    'theme' => 'gradient-danger',
                ]) ?>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <a href="<?= \yii\helpers\Url::toRoute(['form-factor/index']) ?>">
                <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Form Factor',
                    'number' => $formFactors,
                    'icon' => 'fas fa-square',
                    'theme' => 'gradient-warning',
                ]) ?>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <a href="<?= \yii\helpers\Url::toRoute(['user/index']) ?>">
                <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'User',
                    'number' => $users,
                    'icon' => 'fas fa-user-plus',
                    'theme' => 'gradient-success',
                ]) ?>
            </a>
        </div>
    </div>
</div>