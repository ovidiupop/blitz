<?php

use Yii;
use brainy\uploader\Uploader;

Yii::$app->h->pre($produs);

echo Uploader::widget([
//    'modal'=>true,
    'model'=>$model,
    'attribute' => $attribute,
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
                'lengthOfName'=>237,
                'filename'=>$produs->denumire,//product name, etc
                'slug'=>true,
                'uniqid'=>true,
                'dbFields'=>[
                    'owner_id'=> $produs->id,
                    'order'=>'999'
                ]
        ],
    ]
]);