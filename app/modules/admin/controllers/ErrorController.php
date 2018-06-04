<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class ErrorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    /**
     * @return string
     * @throws \yii\base\InvalidRouteException
     */
    public function actionIndex()
    {
        $exception = $this->findException();
        if( $exception instanceof HttpException && $exception->statusCode == 404 )
            return $this->render( '/default/index' );

        return $this->runAction( 'error' );
    }

    /**
     * @return \Exception|NotFoundHttpException
     */
    protected function findException()
    {
        $exception = Yii::$app->getErrorHandler()->exception;
        if( $exception === null )
            $exception = new NotFoundHttpException();

        return $exception;
    }
}
