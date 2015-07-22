<?php

use yii\bootstrap\Nav;

$user = Yii::$app->user->identity;
$networksVisible = count(Yii::$app->authClientCollection->clients) > 0;
?>

<?= Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px; margin-left: 20px;'
    ],
    'items' => [
        [
            'label' => Yii::t('user', 'Settings'),
            'items' => [
                ['label' => Yii::t('user', 'Profile'),  'url' => ['/user/settings/profile']],
                ['label' => Yii::t('user', 'Account'),  'url' => ['/user/settings/account']],
                ['label' => Yii::t('user', 'Networks'), 'url' => ['/user/settings/networks'], 'visible' => $networksVisible],
            ]
        ]
    ]
]) ?>
