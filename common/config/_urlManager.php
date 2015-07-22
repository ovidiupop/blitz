<?php

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '<alias:[\w\-]+>-<id:\d+>' => 'page/page/view',//page slug-id abc-def-2
        '<alias:page>/<action:\w+>/<id:\d+>' => 'page/page/<action>',
        
        '<alias:contact>' => 'site/contact',
        '<alias:register|resend|confirm>' => 'user/registration/<alias>',
        '<alias:logout|login>' => 'user/security/<alias>',
        '<alias:request|reset>' => 'user/recovery/<alias>',
        '<alias:profile|account|networks>' => 'user/settings/<alias>',
        
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        
              
    ],
];
