<?php

namespace app\themes\backend\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $baseUrl = '@web/dist/backend';

    public $js = [
        'js/build.js',
    ];

    public $css = [
        'css/build.css',
    ];
}
