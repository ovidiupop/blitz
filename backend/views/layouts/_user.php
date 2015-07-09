<?php
    use yii\helpers\Html;
    if(Yii::$app->user->isGuest){
        \yii\web\Controller::goHome();
    }
?>

<!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->

                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>
                            <p>
                                <?=Yii::$app->user->identity->username;?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        

                        <!-- Menu Body -->
<!--                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>-->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    Yii::t('user', 'Profile'),
                                    ['/user/settings/profile'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                                <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    Yii::t('user', 'Disconnect'),
                                    ['/user/security/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                        
                    </ul>
                </li>