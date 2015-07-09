<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\helpers\Json;


class AjaxController extends Controller{
   
    public function actionLocalitati() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = \common\models\Localitate::find()->andWhere(['judet'=>$id])->asArray()->all();
 
            $selected = null;
            
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $element) {
                    $out[] = ['id' => $element['id'], 'name' => $element['nume']];
                    if ($i == 0) {
                        $selected = $element['id'];
                    }
                }
                
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected'=>$selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected'=>'']);
    }
    
}