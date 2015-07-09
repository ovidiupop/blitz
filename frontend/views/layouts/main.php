<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

AppAsset::register($this);?>

<?php $this->beginPage();?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            <meta charset="<?= Yii::$app->charset ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>
        <body>
            <?php $this->beginBody() ?>
            <div class="wrap">

                <?php echo Yii::$app->topmenu->menu; ?>
                <div class="container">
                    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],])?>
                    <?php 
                        // echo Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
            <?= $this->render('_footer');?>
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage() ?>
