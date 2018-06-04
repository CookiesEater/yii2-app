<?php

use yii\helpers\ArrayHelper;

return ArrayHelper::merge(
    require( __DIR__ . '/main.php' ),
    [
        'id'   => 'yii2-app-console',
        'name' => 'Yii2 App Console',
        'controllerNamespace' => 'app\console\controllers',
    ],
    require( __DIR__ . '/console.local.php' )
);
