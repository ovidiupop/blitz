<?php
/**
 * Created by matricks.
 * User: matricks
 */

namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Pair;
use yii\helpers\Json;
use \yii\base\ErrorException;

class Pairs extends Component {

    public function set($name, $value, $jsonEncode = false) {
        $encoded = false;
        //force array to be json
        if(is_array($value)){
            $value = Json::encode($value);
            $encoded = true;
        }

        //encode only non-empty value
        if (!$encoded && $jsonEncode && $value !== "") {
            $value = Json::encode($value);
        }

        $model = new Pair();
        $model->name = $name;
        $model->value = $value;
        
        try {
            $model->save();
            return Yii::$app->db->getLastInsertID();
        } catch (ErrorException $e) {
            Yii::warning(Yii::t('app', 'Not saved!'));
            return false;
        }
    }

    public function update($id, $name, $value, $jsonEncode = false) {
        $encoded = false;

        //force array to be json
        if(is_array($value)){
            $value = !$this->isJson($value) ? Json::encode($value, JSON_FORCE_OBJECT) : $value;
            $encoded = true;
        }

        //encode only non-empty value
        if (!$encoded && $jsonEncode && $value !== "") {
            $value = !$this->isJson($value) ? Json::encode($value) : $value;
        }

        $model = $this->findModelId($id);
        $model->name = $name;
        $model->value = $value;
        
        try {
            $model->save();
            return $id;
        } catch (ErrorException $e) {
            Yii::warning(Yii::t('app', 'Not saved!'));
            return false;
        }
    }

    public function get($name) {
        $model = $this->findModel($name);
        $value = $model->value;
        
        if($this->isJson($value)){
            $value = Json::decode($value, true);
        }
        
        return $this->val($value);
    }   

    public function val($string) {
        if(is_array($string))
            return $string;
        
        return $string && $string[0] == '[' ? $string = (array)$string : $string;
    } 
    
    public function isJson($string) {
        if(!is_array($string)) {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }
    }

    protected function findModel($name) {
        if (($model = Pair::find()->where(['name'=>$name])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModelId($id) {
        if (($model = Pair::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
