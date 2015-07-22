<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

AppAsset::register($this);

?>
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
            
        <div id="container">

            <?php
            echo $this->render('_header');
//            echo $this->render('_slider');     
//            echo $this->render('_service');             
//            echo $this->render('_purchase');           
//            echo $this->render('_portofolio');       
//            echo $this->render('_testimonials');                   
//            echo $this->render('_team');     
         
//            echo $this->render('_pricing');           
//            echo $this->render('_clients');     
              
            echo $content;
              
              
            echo $this->render('_footer');
            

            echo $this->render('_switcher');
            ?>
        
        
        
    </div>
    <!-- End Full Body Container -->

        <?=$this->render('_loader');?>
            
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage() ?>
