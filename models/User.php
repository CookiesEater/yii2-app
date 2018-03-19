<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $created_at
 * @property string $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'email' => 'Email',
            'password' => 'Пароль',
            'auth_key' => 'Auth Key',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave( $insert )
    {
        if( !parent::beforeSave( $insert ) )
            return false;

        if( $this->isNewRecord )
        {
            $this->created_at = new Expression( 'NOW()' );
            $this->setPassword( $this->password );
            $this->auth_key = Yii::$app->security->generateRandomString();
        }

        $this->updated_at = new Expression( 'NOW()' );

        return true;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity( $id )
    {
        return self::findOne( $id );
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken( $token, $type = null )
    {
        throw new NotSupportedException( '"findIdentityByAccessToken" is not implemented.' );
    }

    /**
     * @param $username
     * @return User|ActiveRecord|null
     */
    public static function findByUsername( $username )
    {
        return self::find()->where( [ 'email' => $username ] )->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey( $authKey )
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @param string $password
     * @return boolean
     */
    public function validatePassword( $password )
    {
        return Yii::$app->security->validatePassword( $password, $this->password );
    }

    /**
     * Устанавливает пароль.
     * @param string $password
     * @throws \yii\base\Exception
     */
    public function setPassword( $password )
    {
        if( !$password )
            return;

        $this->password = Yii::$app->security->generatePasswordHash( $password );
    }
}
