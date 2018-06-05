<?php

namespace app\modules\admin\modules\rest\controllers;

use app\models\User;
use app\modules\admin\modules\rest\components\Controller;
use yii\rest\CreateAction;
use yii\rest\DeleteAction;
use yii\rest\IndexAction;
use yii\rest\OptionsAction;
use yii\rest\UpdateAction;
use yii\rest\ViewAction;

class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    protected function verbs(): array
    {
        return [
            'index' => [ 'GET', 'HEAD' ],
            'view' => [ 'GET', 'HEAD' ],
            'create' => [ 'POST' ],
            'update' => [ 'PUT', 'PATCH' ],
            'delete' => [ 'DELETE' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions(): array
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'modelClass' => User::class,
            ],
            'view' => [
                'class' => ViewAction::class,
                'modelClass' => User::class,
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => User::class,
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => User::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => User::class,
            ],
            'options' => [
                'class' => OptionsAction::class,
            ],
        ];
    }
}
