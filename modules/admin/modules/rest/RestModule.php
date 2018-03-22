<?php

namespace app\modules\admin\modules\rest;

use Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\web\Response;

class RestModule extends Module
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->user->enableSession = false;
        Yii::$app->user->enableAutoLogin = false;
        Yii::$app->response->format = Response::FORMAT_JSON;
    }
}
