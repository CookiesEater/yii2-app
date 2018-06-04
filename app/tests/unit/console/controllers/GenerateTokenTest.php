<?php

use \yii\helpers\FileHelper;
use \app\console\controllers\GenerateTokenController;

class GenerateTokenTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var string
     */
    protected $configPath = '@runtime/config';

    /**
     * @var string
     */
    protected $paramsConfig = 'params.local.php';

    /**
     * @var string
     */
    protected $webConfig = 'web.local.php';

    /**
     * @inheritdoc
     */
    protected function _before()
    {
        FileHelper::createDirectory( Yii::getAlias( $this->configPath ) );
    }

    /**
     * @inheritdoc
     */
    protected function _after()
    {
        FileHelper::removeDirectory( Yii::getAlias( $this->configPath ) );
    }

    /**
     * Put config array to file.
     * @param $path
     * @param $config
     */
    protected function putConfig( string $path, array $config )
    {
        file_put_contents( Yii::getAlias( $path ), "<?php\nreturn " . var_export( $config, true ) . ';' );
    }

    /**
     * Create instance of console controller.
     * @param array $config
     * @return object
     */
    protected function createGenerateController( array $config = [] ): GenerateTokenController
    {
        $module = $this->getMockBuilder( \yii\base\Module::class )
            ->setMethods( [ 'fake' ] )
            ->setConstructorArgs( [ 'console' ] )
            ->getMock();
        $generateController = new GenerateTokenController( 'migrate', $module );
        $generateController->interactive = false;
        $generateController->configPath = $this->configPath;
        $generateController->web = $this->webConfig;
        $generateController->params = $this->paramsConfig;
        return Yii::configure( $generateController, $config );
    }

    /**
     * Run action from console controller.
     * @param string $actionId
     * @param array $args
     * @param array $config
     * @return string
     */
    protected function runGenerateControllerAction( string $actionId, array $args = [], array $config = [] ): string
    {
        $controller = $this->createGenerateController( $config );
        ob_start();
        ob_implicit_flush( false );
        $controller->run( $actionId, $args );
        return ob_get_clean();
    }

    /**
     * Test JWT generation.
     */
    public function testGenerateJwt()
    {
        $path = Yii::getAlias( "{$this->configPath}/{$this->paramsConfig}" );
        $this->putConfig( $path, [ 'JwtTokenSecret' => '' ] );
        $this->runGenerateControllerAction( 'jwt' );
        $config = require $path;
        $this->assertTrue( strlen( $config[ 'JwtTokenSecret' ] ) === 32 );

        $this->runGenerateControllerAction( 'jwt', [], [ 'force' => true ] );
        $configNew = require $path;
        $this->assertTrue( strlen( $configNew[ 'JwtTokenSecret' ] ) === 32 );
        $this->assertTrue( $configNew[ 'JwtTokenSecret' ] !== $config[ 'JwtTokenSecret' ] );
    }

    /**
     * Test CookieValidationKey generation.
     */
    public function testGenerateCookieValidationKey()
    {
        $path = Yii::getAlias( "{$this->configPath}/{$this->webConfig}" );
        $this->putConfig( $path, [
            'components' => [
                'request' => [
                    'cookieValidationKey' => '',
                ],
            ],
        ]);
        $this->runGenerateControllerAction( 'cookie-validation-key' );
        $config = require $path;
        $this->assertTrue( strlen( $config[ 'components' ][ 'request' ][ 'cookieValidationKey' ] ) === 32 );

        $this->runGenerateControllerAction( 'cookie-validation-key', [], [ 'force' => true ] );
        $configNew = require $path;
        $this->assertTrue( strlen( $configNew[ 'components' ][ 'request' ][ 'cookieValidationKey' ] ) === 32 );
        $this->assertTrue( $configNew[ 'components' ][ 'request' ][ 'cookieValidationKey' ] !== $config[ 'components' ][ 'request' ][ 'cookieValidationKey' ] );
    }
}
