<?php

use yii\helpers\ArrayHelper;

return ArrayHelper::merge(
    require( __DIR__ . '/main.php' ),
    [
        /**
         * Настройки системы
         */
        'layout'              => 'main',
        'bootstrap'           => [ 'log' ],
        'controllerNamespace' => 'app\controllers',

        /**
         * Подключённые компоненты
         */
        'components' => [
            'request' => [
                'parsers' => [
                    'application/json' => yii\web\JsonParser::class,
                ],
            ],

            // Управление выводом
            'view' => [
                'theme' => [
                    'basePath' => '@app/themes/frontend',
                    'baseUrl' => '@web',
                ],
            ],

            // Управление ошибками
            'errorHandler' => [
                'errorAction' => 'site/error',
            ],

            // Управление пользоавтелями
            'user' => [
                'identityClass' => app\models\User::class,
                'loginUrl' => [ '/admin/login' ],
            ],

            'assetManager' => [
                'bundles' => [
                    'yii\web\YiiAsset' => [
                        'depends' => [
                            app\assets\JqueryAsset::class,
                        ],
                    ],
                    'yii\web\JqueryAsset' => [
                        'js' => []
                    ],
                    'yii\bootstrap\BootstrapPluginAsset' => [
                        'js' => []
                    ],
                    'yii\bootstrap\BootstrapAsset' => [
                        'css' => [],
                    ],
                ],
            ],
        ],

        /**
         * Модули.
         */
        'modules' => [
            'admin' => [
                'class' => app\modules\admin\AdminModule::class,
            ],
        ],
    ],
    require( __DIR__ . '/web.local.php' )
);
