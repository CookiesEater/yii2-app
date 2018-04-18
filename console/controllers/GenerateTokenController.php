<?php

namespace app\console\controllers;

use Yii;
use yii\base\Security;
use yii\console\ExitCode;

/**
 * Generate various tokens.
 */
class GenerateTokenController extends \yii\console\Controller
{
    /**
     * Force regenerate.
     * @var bool
     */
    public $force = false;

    /**
     * Alias to config files.
     * @var string
     */
    public $configPath = '@app/config';

    /**
     * Web config filename.
     * @var string
     */
    public $web = 'web.local.php';

    /**
     * Params config filename.
     * @var string
     */
    public $params = 'params.local.php';

    /**
     * @inheritdoc
     */
    public function options( $actionID )
    {
        return [ 'force', 'interactive' ];
    }

    /**
     * @inheritdoc
     */
    public function optionAliases()
    {
        return [
            'f' => 'force',
        ];
    }

    /**
     * @return int
     * @throws \yii\base\InvalidRouteException
     * @throws \yii\console\Exception
     */
    public function actionIndex()
    {
        if( $this->confirm('Generate CookieValidationKey?') )
            $this->runAction( 'cookie-validation-key' );
        if( $this->confirm('Generate JwtTokenSecret?') )
            $this->runAction( 'jwt' );

        $this->stdout( "All jobs done.\n" );
        return ExitCode::OK;
    }

    /**
     * @return int
     * @throws \yii\base\Exception
     */
    public function actionCookieValidationKey()
    {
        $config = Yii::getAlias( "{$this->configPath}/{$this->web}" );
        $this->stdout( "Generate CookieValidationKey token in file '{$config}' ...\n" );
        if( !is_file( $config ) )
        {
            $this->stderr( "Can't find {$config}" );
            return ExitCode::IOERR;
        }

        $count = 0;
        $token = ( new Security() )->generateRandomString( 32 );
        $template = '/(("|\')cookieValidationKey("|\')\s*=>\s*)(""|\'\')/';
        $templateForce = '/(("|\')cookieValidationKey("|\')\s*=>\s*)("[^"]+"|\'[^\']+\')/';
        $content = preg_replace( $this->force ? $templateForce : $template, "\\1'{$token}'", file_get_contents($config), -1, $count );

        if( !$count )
        {
            if( $this->force )
                $this->stderr( "Can't find 'cookieValidationKey' definition\n" );
            else
                $this->stderr( "Can't find 'cookieValidationKey' definition or it's already filled (use -f to force regenerate)\n" );

            return ExitCode::DATAERR;
        }

        file_put_contents( $config, $content );
        $this->stdout( "Token was successfully generated.\n" );
        return ExitCode::OK;
    }

    /**
     * @return int
     * @throws \yii\base\Exception
     */
    public function actionJwt()
    {
        $config = Yii::getAlias( "{$this->configPath}/{$this->params}" );
        $this->stdout( "Generate jwt token in file '{$config}' ...\n" );
        if( !is_file( $config ) )
        {
            $this->stderr( "Can't find {$config}" );
            return ExitCode::IOERR;
        }

        $count = 0;
        $token = ( new Security() )->generateRandomString( 32 );
        $template = '/(("|\')JwtTokenSecret("|\')\s*=>\s*)(""|\'\')/';
        $templateForce = '/(("|\')JwtTokenSecret("|\')\s*=>\s*)("[^"]+"|\'[^\']+\')/';
        $content = preg_replace( $this->force ? $templateForce : $template, "\\1'{$token}'", file_get_contents($config), -1, $count );

        if( !$count )
        {
            if( $this->force )
                $this->stderr( "Can't find 'JwtTokenSecret' definition\n" );
            else
                $this->stderr( "Can't find 'JwtTokenSecret' definition or it's already filled (use -f to force regenerate)\n" );

            return ExitCode::DATAERR;
        }

        file_put_contents( $config, $content );
        $this->stdout( "Token was successfully generated.\n" );
        return ExitCode::OK;
    }
}
