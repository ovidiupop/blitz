<?php
namespace common\components\upload;

use Yii;
use yii\base\Widget;

/**
 * Class TextWidget
 * Return a text block content stored in db
 * @package common\components\widgets\text
 */
class UploadWidget extends Widget{
    /**
     * @var string text block alias
     */
    public $alias;

    public function init(){
        parent::init();

    }
    
    /**
     * @return string
     */
    public function run(){
        if(isset($_POST['imagine'])){
            return "CEAC";
        }else{
            return $this->render('uploader', ['alias'=>$this->alias]);
        }
    }
}