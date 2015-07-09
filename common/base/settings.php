<?php

namespace common\base;

use Yii;
use yii\base\BootstrapInterface;

/*
  /* The base class that you use to retrieve the settings from the database
 */

class settings implements BootstrapInterface {

    private $db;

    public function __construct() {
        $this->db = Yii::$app->db;
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * Loads all the settings into the Yii::$app->params array
     * @param Application $app the application currently running
     */
    public function bootstrap($app) {
        $db = $this->db;
        // Get settings from database and cache them
        //settings for common and for frontend/backend
        //frontend/backend will override common params

        //with cache
//        $object = $db->cache(function ($db) use($app){
//            return $db->createCommand("SELECT name, value FROM params where app_id = 'common' or app_id='$app->id' order by 'common, $app->id'")->queryAll();
//        });
//        
        //without cache
        $object = $db->createCommand("SELECT name, value FROM params where app_id = 'common' or app_id='$app->id' order by 'common, $app->id'")->queryAll();

        foreach ($object as $arr) {
            Yii::$app->params[$arr['name']] = $this->getValue($arr['value']);
        }
    }

    /* Set array type */
    public function getValue($string) {
        return $string && $string[0] == '[' ? $string = (array)$string : $string;
    }    
    
//    public function getValue($string) {
//        json_decode($string);
//        $return = json_last_error() == JSON_ERROR_NONE ? json_decode($string, true) : $string;
//        if($return[0] == '['){
//            $return = (array)$return;
//        }
//        return $return;
//    }

}
