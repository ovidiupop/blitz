<?php
$folder = '/blitz';

Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('storage', dirname(dirname(__DIR__)) . '/storage');
Yii::setAlias('images', dirname(dirname(__DIR__)) . '/storage/images');
Yii::setAlias('themes', dirname(dirname(__DIR__)) . '/frontend/themes');


////
Yii::setAlias('vendor', dirname(dirname(__DIR__)) . '/vendor');



Yii::setAlias('@baseUrl', $folder.'/frontend/web');
Yii::setAlias('@baseUrlCommon', $folder.'/common');
Yii::setAlias('@baseUrlFrontend', $folder.'/frontend/web');
Yii::setAlias('@baseUrlBackend', $folder.'/backend/web');
Yii::setAlias('@baseUrlStorage', $folder.'/storage');
Yii::setAlias('@baseUrlImages', $folder.'/storage/images');
Yii::setAlias('@baseUrlThemes', $folder.'/frontend/themes');


