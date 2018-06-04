<?php

namespace app\modules\admin\modules\rest\controllers;

use app\models\User;
use app\modules\admin\modules\rest\components\Controller;
use app\modules\admin\modules\rest\components\Sort;
use yii\data\ActiveDataProvider;

class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'list' => [ 'GET', 'HEAD' ],
        ];
    }

    /**
     * @return ActiveDataProvider
     */
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'sort' => [
                'class' => Sort::class,
                'attributes' => [ 'id', 'email', 'create_at', 'updated_at' ],
            ],
        ]);

        return $dataProvider;
    }
}
