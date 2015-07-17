<?php
/* @var $this yii\web\View */
//use common\components\widgets\image\ImageWidget;
use brainy\uploader\Uploader;
use yii\helpers\Html;

$this->title = 'My Yii Application';

?>
<div class="site-index">
   
    
<?php

//echo Uploader::widget();
//echo Yii::$app->uploader();
$model = new common\models\Pair();
echo Uploader::widget([
//    'modal'=>true,
//    'model'=>$model,
//    'attribute' => 'value',
    'options'=>[
        'multiple'=>true,
    ],
    'pluginOptions' => [
        'uploadExtraData'=>[
                'imgFolderPath'=>Yii::getAlias('@images').'/tests',           
                'thumbnailSize'=>[320, 200],
                'multiplePath'=>[
                    'full'=>false,
                    'middle'=>[400, 400],
                    'thumb'=>[150, 150]
                ],
                'filename'=>'the uploaded file on the server.',//product name, etc
                'lengthOfName'=>237,
                'slug'=>true,
                'uniqid'=>true,
                'dbFields'=>[
                    'product'=>'22',
                    'order'=>'999'
                ]
        ],
    ]
]);


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
