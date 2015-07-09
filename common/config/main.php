<?php
//<!--common/config/main.php-->
return [
    'language'=>'ro-RO',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => require(__DIR__.'/_components.php'), 
    
    //here we set all params for app
    'bootstrap' => [
        'common\base\settings',
    ],    
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'modelMap' => [
                'User'=>'common\models\user\User',
                'UserSearch'=>'common\models\user\UserSearch',
                'Profile' => 'common\models\user\Profile',
            ],
            
            'controllerMap' => [
                'security' => 'common\controllers\user\SecurityController'                
            ],
            
            // following line will restrict access to admin page
//            'as frontend' => 'dektrium\user\filters\FrontendFilter',            
        ],

        'gridview' =>  [
             'class' => '\kartik\grid\Module'
             // enter optional module parameters below - only if you need to  
             // use your own export download action or custom translation 
             // message source
             // 'downloadAction' => 'gridview/export/download',
             // 'i18n' => []
         ]        
    ],    
];
