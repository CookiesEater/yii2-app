<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\web\ErrorAction;

class ErrorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => ErrorAction::class,
            ],
        ];
    }
}
