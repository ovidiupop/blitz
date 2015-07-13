<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'GMQ3jDWrQeW11dY9MWxM1rWARrv6pk4A',
        ],
    ],
];

//$config['modules']['gii'] = [
//    'class'      => 'yii\gii\Module',
//    'generators' => [
//        'crud'   => [
//            'class'     => 'yii\gii\generators\crud\Generator',
//            'templates' => ['mycrud' => '@app/templates/crud']
//        ]
//    ]
//];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
        $config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'generators'=>[
            'crud'=>[
                'class'=>'yii\gii\generators\crud\Generator',
                'templates'=>[
                    'custom'=>'@app/templates'
                ],                
            ]
        ]
    ];
}

return $config;
