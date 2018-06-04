<?php

namespace app\modules\admin\forms;

use app\models\User;
use yii\base\Model;

class UserForm extends Model
{
    public $id;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ 'email', 'required' ],
            [ 'email', 'email' ],
            [ 'password', 'string' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Новый пароль',
        ];
    }

    /**
     * @throws \yii\base\Exception
     */
    public function save()
    {
        $modelUser = User::findOne( $this->id );

        $modelUser->email = $this->email;
        if( $this->password )
            $modelUser->setPassword( $this->password );

        $modelUser->save();
    }
}
