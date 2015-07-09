<?php
use yii\helpers\Html;

    //actions not in cpanel
    $actionsFullPage = ['login', 'resend', 'request', 'register'];
    if (in_array(Yii::$app->controller->action->id, $actionsFullPage)) {
        echo $this->render('login', ['content' => $content]);
        return;
    }

    //normal content
    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

    $this->beginPage() ?>
        <!DOCTYPE html>
        <html lang="<?= Yii::$app->language ?>">
        <head>
            <meta charset="<?= Yii::$app->charset ?>"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>

        <body class="<?= \dmstr\helpers\AdminLteHelper::skinClass() ?> sidebar-mini">    
            <?php $this->beginBody() ?>
                <div class="wrapper">
                    <?= $this->render('header', ['directoryAsset' => $directoryAsset]) ?>
                    <?= $this->render('left', ['directoryAsset' => $directoryAsset]) ?>
                    <?= $this->render('content', ['content' => $content, 'directoryAsset' => $directoryAsset]) ?>
                </div>
            <?php $this->endBody() ?>
        </body>
        </html>
    <?php $this->endPage();

