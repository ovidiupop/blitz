<?php
namespace frontend\components\widgets;

use Yii;
use yii\base\Component;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

class topmenu extends Component {
    
    public function getMenu() {
        $isAdmin = !Yii::$app->user->isGuest ? Yii::$app->user->identity->can('editor') : false;
        $canAdmin = !Yii::$app->user->isGuest ? Yii::$app->user->identity->can('editor') : false;
        $networksVisible = count(Yii::$app->authClientCollection->clients) > 0;
        
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => Yii::t('user', 'Sign up'), 'url' => ['/user/registration/register']];
            $menuItems[] = ['label' => Yii::t('user', 'Sign in'), 'url' => ['/user/security/login']];
        } else {
            $menuItems['user'] = [
                'label' => $isAdmin ? Yii::$app->user->identity->profile->fullname .' (admin)': Yii::$app->user->identity->profile->fullname,
                'items' => [
                    ['label' => Yii::t('user', 'Profile'), 'url' => ['/user/settings/profile']],
                    ['label' => Yii::t('user', 'Account'), 'url' => ['/user/settings/account']],
                    ['label' => Yii::t('user', 'Networks'), 'url' => ['/user/settings/networks'], 'visible' => $networksVisible],
                    '<li class="divider"></li>',
                    ['label'=>Yii::t('user', 'Logout'), 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']]
                ],
            ];
        }

        if($canAdmin){
            $menuItems['user']['items'][] = '<li class="divider"></li>';
            $menuItems['user']['items'][]=['label' => Yii::t('user', 'Admin Panel'), 'url' => Yii::$app->urlManagerBackEnd->createUrl('')];
        }
    
        NavBar::begin([
                'brandLabel' => Yii::$app->params['companyName'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
 
            echo Nav::widget([
                 'options' => ['class' => 'navbar-nav navbar-right'],
                 'items' => $menuItems,
             ]);
            
        NavBar::end();
    }

}
