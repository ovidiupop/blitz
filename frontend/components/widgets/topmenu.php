<?php
namespace frontend\components\widgets;

use Yii;
use yii\base\Component;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\widgets\Menu;

class topmenu extends Component {
    
    public $navBarClass;
    public $brandLabel;
    public $brandImage;    
    public $brandUrl;
    protected $isAdmin;
    protected $canAdmin;
    protected $networksVisible;
    protected $userLabel;
    protected $backendUrl;

    public function init(){
        parent::init();
        
        if(!isset($this->navBarClass)){
            $this->navBarClass = 'nav navbar-nav navbar-right';
        }
        if(!isset($this->brandLabel)){
            $this->brandLabel = Yii::$app->params['companyName'];
        }
        if(!isset($this->brandImage)){
            $this->brandImage = \yii\helpers\Html::img('../themes/margo/assets/images/brand.png', ['alt'=>$this->brandLabel]);
        }        
        if(!isset($this->brandUrl)){
            $this->brandUrl = Yii::$app->homeUrl;
        }
        $this->isAdmin = !Yii::$app->user->isGuest ? Yii::$app->user->identity->can('editor') : false;
        $this->canAdmin = !Yii::$app->user->isGuest ? Yii::$app->user->identity->can('editor') : false;
        $this->networksVisible = count(Yii::$app->authClientCollection->clients) > 0;      
        $this->backendUrl = Yii::$app->urlManagerBackEnd->createUrl('');
        if(!Yii::$app->user->isGuest){
            $this->userLabel = $this->isAdmin ? Yii::$app->user->identity->profile->fullname .' (admin)': Yii::$app->user->identity->profile->fullname;
        }
    }
    
    public function getMenu() {
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
                'label' => $this->userLabel,
                'items' => [
                    ['label' => Yii::t('user', 'Profile'), 'url' => ['/user/settings/profile']],
                    ['label' => Yii::t('user', 'Account'), 'url' => ['/user/settings/account']],
                    ['label' => Yii::t('user', 'Networks'), 'url' => ['/user/settings/networks'], 'visible' => $this->networksVisible],
                    '<li class="divider"></li>',
                    ['label'=>Yii::t('user', 'Logout'), 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']]
                ],
            ];
        }

        if($this->canAdmin){
            $menuItems['user']['items'][] = '<li class="divider"></li>';
            $menuItems['user']['items'][]=['label' => Yii::t('user', 'Admin Panel'), 'url' => $this->backendUrl];
        }
    
            
            NavBar::begin([
                'brandLabel' => $this->brandImage,
                'brandUrl' => $this->brandUrl,
                'options' => [
                    'class' => 'navbar navbar-nav',
                ],
            ]);

            echo Nav::widget([
                 'options' => ['class' => 'navbar-nav navbar-right'],
                 'items' => $menuItems,
             ]);
            ?>
    <!--Start Search--> 
    <div class="search-form">
        <input type="text" width="500" value="" />
    </div>
<!--            <div class="search-side">
                <a href="#" class="show-search"><i class="fa fa-search"></i></a>
                <div class="search-form">
                    <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                        <input type="text" value="" name="s" id="s" placeholder="Search the site...">
                    </form>
                </div>
            </div>-->
    <!--End Search-->            
            <?php
            
        NavBar::end();
    }

    
    
}
