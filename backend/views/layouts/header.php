<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
?>

<header class="main-header">
    <?php 
    echo Html::a('<span class="logo-mini">Logo</span><span class="logo-lg">'. Yii::$app->name. '</span>', 
            Yii::$app->urlManagerFrontEnd->createUrl(''), 
            ['class' => 'logo']) 
        ?>
    
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php 
                    if(Yii::$app->params['showNotifications']){
                        echo $this->render('_notifications', ['directoryAsset'=>$directoryAsset]);
                    }
                ?>
                <?= $this->render('_user', ['directoryAsset'=>$directoryAsset]);?>
                <?php
                    if(Yii::$app->params['showRightSidebar']){
                        echo $this->render('_toggleRightContent');    
                    }else{?>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <?php }
                ?>
            </ul>
        </div>
    </nav>
</header>
