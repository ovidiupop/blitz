<?php

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => false,
    'showScriptName' => false,
    'rules' => [
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<alias:register|resend|confirm>' => 'user/registration/<alias>',
        '<alias:logout|login>' => 'user/security/<alias>',
        '<alias:request|reset>' => 'user/recovery/<alias>',
        '<alias:profile|account>' => 'user/settings/<alias>',
        
    ],
];
