<?php

namespace app\modules\admin\forms;

use Yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [ [ 'username', 'password' ], 'required' ],
            [ 'rememberMe', 'boolean' ],
            [ 'password', 'validatePassword' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function validatePassword( $attribute, $params )
    {
        if( !$this->hasErrors() )
        {
            $user = $this->getUser();

            if( !$user || !$user->validatePassword( $this->password ) )
                $this->addError( $attribute, 'Неверный логин или пароль.' );
        }
    }

    /**
     * @return bool
     */
    public function login()
    {
        if( $this->validate() )
            return Yii::$app->user->login( $this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0 );

        return false;
    }

    /**
     * @var bool|User
     */
    protected $user = false;

    /**
     * @return User|null
     */
    public function getUser()
    {
        if( $this->user === false )
            $this->user = User::findByUsername( $this->username );

        return $this->user;
    }
}
