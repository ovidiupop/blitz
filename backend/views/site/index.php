<?php
/* @var $this yii\web\View */
use common\components\widgets\image\ImageWidget;
use brainy\uploader\Uploader;
use yii\helpers\Html;


$this->title = 'My Yii Application';
?>
<div class="site-index">

<?php
//echo Yii::$app->uploader();
echo Uploader::widget();


//     echo Html::well(
//        'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.',
//        Html::LARGE
//     );


//
//$var = Yii::$app->pair->get('arraysimple'); 
//    if(is_array($var)){
//        Yii::$app->h->pre($var);
//    }else
//        echo $var;
?>
    
    
    
</div>
