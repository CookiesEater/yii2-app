<?php

namespace app\modules\admin;

use Yii;
use yii\base\Module;
use yii\filters\AccessControl;

class AdminModule extends Module
{
    /**
     * @inheritdoc
     */
    public $defaultRoute = 'dashboard';

    /**
     * @inheritdoc
     */
    public $layout = 'full';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->errorHandler->errorAction = '/admin/error/index';
        Yii::$app->view->theme->basePath = '@app/themes/backend';
        Yii::$app->view->theme->baseUrl = '@web';
        Yii::$app->view->theme->pathMap = [
            '@app/views' => '@app/themes/backend/views',
            '@app/modules' => '@app/themes/backend/views/modules',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'except' => [ 'login/index' ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [ '@' ],
                    ],
                ],
            ],
        ];
    }
}
