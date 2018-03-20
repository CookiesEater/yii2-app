<?php

namespace app\modules\admin\controllers;

use app\modules\admin\forms\UserForm;
use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    public $defaultAction = 'list';

    /**
     * @return string|\yii\web\Response
     */
    public function actionList()
    {
        $userDataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render( 'list', [
            'userDataProvider' => $userDataProvider,
        ]);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView( $id )
    {
        $modelUser = $this->loadModel( $id );

        return $this->render( 'view', [
            'modelUser' => $modelUser,
        ]);
    }

    /**
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\base\Exception
     */
    public function actionUpdate( $id )
    {
        $modelUser = $this->loadModel( $id );
        $formUser = new UserForm();
        $formUser->load( $modelUser->toArray(), '' );
        $formUser->id = $modelUser->id;
        $formUser->password = '';

        if( $formUser->load( Yii::$app->request->post() ) && $formUser->validate() )
        {
            $formUser->save();
            Yii::$app->session->setFlash( 'success', 'Пользователь обновлён' );
            return $this->refresh();
        }

        return $this->render( 'update', [
            'formUser' => $formUser,
        ]);
    }

    /**
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete( $id )
    {
        $modelUser = $this->loadModel( $id );
        $modelUser->delete();

        if( !Yii::$app->request->isAjax )
            return $this->redirect( [ 'list' ] );

        return $this->asJson( [ 'status' => 'success' ] );
    }

    /**
     * @param int $id
     * @return User
     * @throws NotFoundHttpException
     */
    protected function loadModel( $id )
    {
        $modelUser = User::findOne( $id );
        if( $modelUser === null )
            throw new NotFoundHttpException( 'Модель не найдена.' );

        return $modelUser;
    }
}
