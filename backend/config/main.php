<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log',],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'product/index' => 'product/index',
                'product/update/<slug:[\w\-]+>' => 'product/update',
                'product/view/<slug:[\w\-]+>' => 'product/view',
                'product/delete/<slug:[\w\-]+>' => 'product/delete',

                'product/set-image/<slug:[\w\-]+>' => 'product/set-image',
                'product/set-color/<slug:[\w\-]+>' => 'product/set-color',
                'product/set-form-factor/<slug:[\w\-]+>' => 'product/set-form-factor',
            ],
        ],

//        'urlManagerFrontend' => [
//            'class' => 'yii\web\urlManager',
//            'baseUrl' => 'http://products.frontend',
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'rules' => [
//            ],
////            'rules' => require(__DIR__ . '../frontend/routes.php'),
//        ],

//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
//                ],
//            ],
//        ],

    ],
    'params' => $params,
];
