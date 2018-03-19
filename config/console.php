<?php

use yii\helpers\ArrayHelper;

if( is_readable( __DIR__ . '/console.local.php' ) )
    $local = require( __DIR__ . '/console.local.php' );

return ArrayHelper::merge(
    require( __DIR__ . '/main.php' ),
    [
        'id'   => 'console',
        'name' => 'Console',
        'controllerNamespace' => 'app\commands',
    ],
    $local
);
