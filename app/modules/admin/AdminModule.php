<?php

namespace app\modules\admin;

use app\modules\admin\modules\rest\RestModule;
use yii\base\Module;

class AdminModule extends Module
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->setModules([
            'rest' => [
                'class' => RestModule::class,
            ],
        ]);
    }
}
