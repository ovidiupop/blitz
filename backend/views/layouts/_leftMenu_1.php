<?php

return [
    'encodeLabels' => false,
    'options' => ['class' => 'sidebar-menu'],
    'items' => [
//        '<li class="header">Menu Yii2</li>',
        [
            'label'=>Yii::t("app", "Tools"),
//            'icon'=>'<i class="fa fa-thumbs-o-up"></i>',
//            'options'=>['class'=>'treeview'],
            'items'=>[
                ['label' => '<i class="fa fa-file-code-o"></i><span>Gii</span>', 'url' => ['/gii']],
                ['label' => '<i class="fa fa-dashboard"></i><span>Debug</span>', 'url' => ['/debug']],
            ]
        ],            
        [
            'label'=>'<i class="glyphicon glyphicon-user"></i><span></span> '.Yii::t("app", "Users"),
//            'icon'=>'<i class="fa fa-thumbs-user"></i>',
//            'options'=>['class'=>'treeview'],
            'items'=>[
                ['label'=>Yii::t("app", "Admin"), 'url'=>['/user/admin/index'], 'icon'=>'<i class="fa fa-list-ol"></i>'],
            ]
        ],
        
        //just to play with
        Yii::$app->user->isGuest 
            ? ['label' => 'Sign in', 'url' => ['/user/security/login']] 
            : ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
        
        ['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
    

    ],
];
