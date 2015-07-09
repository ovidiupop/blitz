<?php
/**
 * Created by matricks.
 * User: matricks
 */

namespace common\components;

use Yii;
use yii\base\Component;
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;

class GlobalComponent extends Component{
	
        public function pre($variable){
            echo '<pre>';
            print_r($variable);
            echo '</pre>';
        }
        
	public function dump($variable){
            $this->pre($variable);
            die();
        }
        
        public function prepareUrl($string, $id = false) {
            $table = array(
                'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
                'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
                'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
                'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
                'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
                'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
                'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
                'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r',
            );

            return $id 
                    ? str_replace(' ', '-', strtr(trim(preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($string))), $table)) . '-' . $id 
                    : str_replace(' ', '-', strtr(trim(preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($string))), $table));
        }      
        
        public function ramburs($pret) {
            if ($pret < 1000) {
                return 7;
            }

            if (($pret > 1000) && ($pret <= 2000)) {
                return 9;
            }

            if ($pret > 2000) {
                $v = ( 1 / 100 ) * (int) $pret;
                return ceil($v);
            }
        }          
        
        public function pretFormat($pret){
            return number_format(floor($pret), 0, '', '.');
        }
        
        public function stariComanda(){
            return ['0' =>'Comanda noua', '1'=>'Comanda in lucru', '2'=>'Comanda finalizata', '3'=>'Comanda anulata'];
        }
        
        public function pdf($html) {
            $pdf = Yii::$app->pdf;
            $pdf->content = $html;
            return $pdf->render();
        }        
               
        public function arrClienti(){
            $arr = ArrayHelper::map(\common\models\Comanda::find()->all(),
                    function($model, $defaultValue) {
                        return $model->fullName;
                    },
                    function($model, $defaultValue) {
                        return $model->fullName;
                    }
                );
            return $arr;
        }        
        
    public function curl_get($url) {
        // Initiate the curl session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Removes the headers from the output
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Return the output instead of displaying it directly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        // Execute the curl session
        $output = curl_exec($ch);

        // Close the curl session
        curl_close($ch);

        return $output;
    }        
}
