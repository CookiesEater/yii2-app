<?php

use yii\helpers\ArrayHelper;

return ArrayHelper::merge(
    require( __DIR__ . '/main.php' ),
    []
);
