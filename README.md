# Yii2 app

Yii2 template with Vue admin as backend, based on Quasar Framework

## To launch

1. Install and build

    ```Bash
    composer install
    npm install
    npm run backend:build
    ```

2. Create .env file, use .env.example as an example and fill it

3. Create local configs with necessary data

    /config/console.local.php
    ```PHP
    <?php

    return [];
    ```

    /config/db.local.php
    ```PHP
    <?php

    return [
        'class' => yii\db\Connection::class,
        'dsn' => 'mysql:host=localhost;dbname=dbname',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'enableSchemaCache' => false,
    ];
    ```

    /config/web.local.php
    ```PHP
    <?php

    return [
        'bootstrap' => [ 'debug' ],
        'modules'   => [
            'debug' => [
                'class' => yii\debug\Module::class,
            ],
        ],
        'components' => [
            'request' => [
                'cookieValidationKey' => '',
            ],
        ],
    ];
    ```

    /config/params.local.php
    ```PHP
    <?php

    return [
        'JwtTokenSecret' => '',
    ];
    ```
4. Generate tokens

    ```Bash
    php yii generate-token
    ```

5. Run migrations

    ```Bash
    php yii migrate
    ```

6. Create user in db (this need to rework in feature)
