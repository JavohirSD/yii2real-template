<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\common\controllers',
    'homeUrl' => '/api',

    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
        'v2' => [
            'class' => 'api\modules\v2\Module',
        ],
        // ... add new versions here
    ],


    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'baseUrl' => '/api',
        ],
        'response' => [
            'formatters' => [
                'json' => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
        ],

        'user' => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => false,
            'enableSession'   => false,
            'loginUrl'        => null,
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
            'rules' => [
                // Begin v1 url rules
                'GET login' => 'v1/user/login',
                'GET v1/news/test'     => 'v1/news/test',
                'POST v1/user/auth'    => 'v1/user/login',
                // METHOD VERSION/CONTROLLER/ALIAS => VERSION/CONTROLLER/ACTION

                // ... add other v1 api url rules here
                ['class' => 'yii\rest\UrlRule',
                     'controller' => [
                         'v1/news',
                         'v1/user',
                        // ... add other controllers here
                    ],
                ],
            ],// End of v1 url rules

        ],
    ],
    'params' => $params,
];
