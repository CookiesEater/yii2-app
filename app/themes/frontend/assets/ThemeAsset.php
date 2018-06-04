<?php

namespace app\themes\frontend\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $baseUrl = '@web/dist/frontend';

    public $js = [
        'js/build.js',
    ];

    public $css = [
        'css/build.css',
    ];
}
