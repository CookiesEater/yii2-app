<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        return $this->render( 'index' );
    }
}