<?php

use yii\log\FileTarget;

return [
    /**
     * Настройки системы
     */
    'id'       => 'yii2-app',
    'name'     => 'yii2-app',
    'basePath' => dirname( __DIR__ ),
    'timeZone' => 'Europe/Moscow',
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],

    /**
     * Подключённые компоненты
     */
    'components' => [
        // Работа с БД
        'db' => require( __DIR__ . '/db.local.php' ),

        // Кеширование
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],

        // URL
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules' => require( __DIR__ . '/url.rules.php' ),
        ],

        // Журналирование
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                // Все ошибки кроме 403 и 404
                [
                    'class'  => FileTarget::class,
                    'levels' => [ 'error', 'warning' ],
                    'except' => [ 'yii\web\HttpException:403', 'yii\web\HttpException:404' ],
                ],
                // Только 403 ошибки
                [
                    'class'      => FileTarget::class,
                    'categories' => [ 'yii\web\HttpException:403' ],
                    'logFile'    => '@runtime/logs/403.log',
                ],
                // Только 404 ошибки
                [
                    'class'      => FileTarget::class,
                    'categories' => [ 'yii\web\HttpException:404' ],
                    'logFile'    => '@runtime/logs/404.log',
                ],
            ],
        ],
    ],

    /**
     * Пользовательский параметры
     */
    'params' => require( __DIR__ . '/params.php' ),
];
