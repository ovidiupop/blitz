<?php
return [
    'components' => [
        'db' => require(__DIR__.'/_db.php'),
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        
        //shop database
        'shopdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=cms_admin',
            'username' => 'matricks',
            'password' => 'verbatim',
            'charset' => 'utf8',
            'tablePrefix'=>'tbl',
        ],        

    ],
];
