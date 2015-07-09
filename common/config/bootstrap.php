<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('storage', dirname(dirname(__DIR__)) . '/storage');
Yii::setAlias('images', dirname(dirname(__DIR__)) . '/storage/images');


////
Yii::setAlias('vendor', dirname(dirname(__DIR__)) . '/vendor');

Yii::setAlias('@baseUrl', '/blitz/frontend/web');
Yii::setAlias('@baseUrlCommon', '/blitz/common');
Yii::setAlias('@baseUrlFrontend', '/blitz/frontend/web');
Yii::setAlias('@baseUrlBackend', '/blitz/backend/web');
Yii::setAlias('@baseUrlStorage', '/blitz/storage');
Yii::setAlias('@baseUrlImages', '/blitz/storage/images');

