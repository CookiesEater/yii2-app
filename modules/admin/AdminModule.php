<?php

namespace app\modules\admin;

use Yii;
use yii\base\Module;
use yii\base\Theme;

class AdminModule extends Module
{
    /**
     * @inheritdoc
     */
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->errorHandler->errorAction = '/admin/error/index';
        Yii::$app->view->theme = Yii::createObject([
            'class' => Theme::class,
            'basePath' => '@app/themes/backend',
            'baseUrl' => '@web',
            'pathMap' => [
                '@app/views' => '@app/themes/backend/views',
                '@app/modules' => '@app/themes/backend/views/modules',
            ],
        ]);
    }
}
