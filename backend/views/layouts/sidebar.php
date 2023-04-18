<?php

use yii\helpers\Url;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!--                <img src="-->
                <? //=$assetDir?><!--/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
            </div>
            <div class="info">
                <a href="<?= Url::toRoute(['user/view', 'id' => Yii::$app->user->identity->id]) ?>"
                   class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Main',
                        'icon' => 'tachometer-alt',
                        'url' => ['site/index'],
                    ],

                    ['label' => 'Products', 'header' => true],
                    ['label' => 'Product', 'url' => ['product/index'], 'icon' => 'fas fa-cart-arrow-down', 'iconClassAdded' => 'text-info'],
                    ['label' => 'Color', 'url' => ['color/index'], 'icon' => 'fas fa-paint-brush', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Form Factor', 'url' => ['form-factor/index'], 'icon' => 'fas fa-square', 'iconClassAdded' => 'text-warning'],

                    ['label' => 'User', 'header' => true],
                    ['label' => 'User', 'url' => ['user/index'], 'icon' => 'fas fa-user', 'iconClassAdded' => 'text-success'],

                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>