<?php

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testJwt()
    {
        Yii::$app->params[ 'JwtTokenSecret' ] = 'jtojq6ynTyjSBLumX6C7';
        $jwtToken = \app\models\User::createJwtToken( 42, [ 'data' => 'test me' ] );
        $jwtDecode = \app\models\User::decodeJwtToken( $jwtToken );

        $this->assertEquals( $jwtDecode[ 'payload' ][ 'data' ], 'test me' );
        $this->assertEquals( $jwtDecode[ 'payload' ][ 'jti' ], 42 );
    }

    public function testValidate()
    {
        $password = 'qwerty';
        $authKey = 'nq2NE121&&!2B172Eb!@b';
        $modelUser = new \app\models\User();
        $modelUser->setPassword( $password );
        $modelUser->auth_key = $authKey;

        $this->assertTrue( $modelUser->validatePassword( $password ) );
        $this->assertTrue( $modelUser->validateAuthKey( $authKey ) );
    }
}
