<?php

namespace app\modules\admin\modules\rest\controllers;

use Yii;
use app\models\User;
use app\modules\admin\modules\rest\components\Controller;
use app\modules\admin\modules\rest\forms\LoginForm;
use yii\web\BadRequestHttpException;

class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors[ 'authenticator' ][ 'except' ] = [ 'login' ];

        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'index' => [ 'GET', 'HEAD' ],
            'login' => [ 'POST' ],
            'refresh' => [ 'GET', 'HEAD' ],
        ];
    }

    /**
     * @return array
     */
    public function actionIndex()
    {
        $modelUser = Yii::$app->user->identity; /** @var User $modelUser */

        return [
            'status' => 'success',
            'data' => [
                'id' => $modelUser->id,
                'name' => $modelUser->email,
                'avatar' => '',
                'email' => $modelUser->email,
            ],
        ];
    }

    /**
     * @return LoginForm|array
     * @throws BadRequestHttpException
     */
    public function actionLogin()
    {
        $modelLogin = new LoginForm();
        if( !$modelLogin->load( Yii::$app->request->post(), '' ) )
            throw new BadRequestHttpException( 'Incorrect data.' );
        if( !$modelLogin->login() )
            return $modelLogin;

        // Отдаём токен
        $token = User::createJwtToken( Yii::$app->user->id );
        Yii::$app->response->getHeaders()->set( 'Authorization', "Bearer {$token}" );

        return [ 'status' => 'success' ];
    }

    /**
     * @return array
     */
    public function actionRefresh()
    {
        $token = User::createJwtToken( Yii::$app->user->id );
        Yii::$app->response->getHeaders()->set( 'Authorization', "Bearer {$token}" );

        return [ 'status' => 'success' ];
    }
}
