<?php

use yii\helpers\ArrayHelper;

return ArrayHelper::merge(
    require( __DIR__ . '/main.php' ),
    [
        'id'   => 'console',
        'name' => 'Console',
        'controllerNamespace' => 'app\commands',
    ],
    require( __DIR__ . '/console.local.php' )
);
