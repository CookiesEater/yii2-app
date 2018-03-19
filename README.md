# Yii2 app

Почему? Потому что yii2-app-advanced кажется перегруженным и там не настроена сборка ресурсов + база для админки.

Здесь сделана сборка для фронтенда и бэкенда через webpack. В качестве админки [coreui.io](https://coreui.io).

## Как запустить

1. Поставить зависимости и собрать

    ```Bash
    composer install
    npm install
    npm run build
    ```

2. Создать файл .env по аналогии с .env.example и заполнить его

3. Создать локальные конфиги с нужными данными:

    /config/console.local.php
    ```PHP
    <?php

    return [];
    ```

    /config/mysql.local.php
    ```PHP
    <?php

    return [
        'class' => yii\db\Connection::class,
        'dsn' => 'mysql:host=localhost;dbname=dbname',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'tablePrefix' => 'n3by1_',
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
                // Обязательно заполнить случайным набором символов
                'cookieValidationKey' => '',
            ],
        ],
    ];
    ```

4. Выбрать пароль и вписать его в /migrations/m000000_000000_init.php

5. Применить миграции

    ```Bash
    php yii migrate
    ```

## Сборка ресурсов для фронтенда и бэкенда

Для js уже настроен babel-preset-env, babel-polyfill и eslint (но вырезать лишнее никогда не поздно)

Для css настроена работа scss, использовать другой препроцессор по аналогии не составит сложностей.

### Production

Конфиг webpack.prod.js

Просто запустить:

```Bash
npm run build
```

### Development

Конфиг webpack.prod.js

Запустить:

```Bash
npm run dev
```

webpack будет запущен с флагом --watch, что позволит видеть изменения сразу после обновления.
