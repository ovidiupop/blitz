<?php
return [
        'urlManager'=>require(__DIR__.'/_urlManager.php'), 
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'pair' => [
            'class' => 'common\components\Pairs',
        ],    
        'h' => [
            'class' => 'common\components\GlobalComponent',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
//        'upload'=>[
//            'class'=>'common\components\upload\UploadWidget',
////            'controllerMap'=>[
////                'upload'=>'common\components\upload\UploadController'
////            ],
//        ],
        
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                // here is the list of clients you want to use
                // you can read more in the "Available clients" section
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => 'APP_ID',
                    'clientSecret' => 'APP_SECRET',
                ],
                 'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],               
                'twitter' => [
                    'class'          => 'dektrium\user\clients\Twitter',
                    'consumerKey'    => 'CONSUMER_KEY',
                    'consumerSecret' => 'CONSUMER_SECRET',
                ],

            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'user*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages/user',
                    'fileMap' => [
                        'user' => 'user.php',
                        'user/error' => 'error.php',
                    ],
                ],
                [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@kvgrid/messages',
                    'forceTranslation' => true                
                ],
            ],
        ],      
    ];
