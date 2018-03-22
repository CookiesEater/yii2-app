<?php

use yii\helpers\ArrayHelper;

if( is_readable( __DIR__ . '/params.local.php' ) )
    $local = require( __DIR__ . '/params.local.php' );

return ArrayHelper::merge([
    'adminEmail' => 'admin@example.com',
], $local);
