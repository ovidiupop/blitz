<?php
//<!--frontend/config/main.php-->
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'frontend',
    'language'=>'ro-RO',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
    ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManagerBackEnd' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,            
            'baseUrl' => Yii::getAlias('@baseUrlBackend'),
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'topmenu'=>[
            'class'=>'frontend\components\widgets\topmenu'
        ],    
    ],
   
    
    'params' => $params,
];
