<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\forms\LoginForm;

class LoginController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        if( !Yii::$app->user->isGuest )
            return $this->redirect( [ '/admin' ] );

        $modelLogin = new LoginForm();
        if( $modelLogin->load( Yii::$app->request->post() ) && $modelLogin->login() )
            return $this->goBack();

        return $this->render( 'index', [
            'modelLogin' => $modelLogin,
        ]);
    }
}
