<?php

namespace app\console\controllers;

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
     * @inheritdoc
     */
    public function options( $actionID )
    {
        return [ 'force' ];
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
     * @throws \yii\base\Exception
     */
    public function actionCookieValidationKey()
    {
        $config = realpath( __DIR__ . '/../../config/web.local.php' );
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
        $config = realpath( __DIR__ . '/../../config/params.local.php' );
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
