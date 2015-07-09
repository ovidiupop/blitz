<?php
namespace common\models\user;

use dektrium\user\models\Profile as BaseProfile;
use Yii;

class Profile extends BaseProfile
{
    
    public static function tableName()
    {
        return '{{%user_profile}}';
    }
    
    
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
//            [['firstname', 'lastname'], 'string', 'max' => 255],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
//            [['picture'], 'string', 'max' => 2048],
            
            [['user_id', 'cnp', 'telefon', 'adresa', 'codpostal', 'judet', 'localitate', 'tip', 'newsletter', 'status'], 'required'],
    
            [['rc', 'cui', 'iban', 'banca', 'contact'], 'required', 'when' => function ($model) {
                return $model->tip == 1;
            }, 'whenClient' => "function (attribute, value) {
                return $('#tip').val() == 1;
            }"],
            
    
            [['user_id', 'judet', 'localitate', 'tip', 'newsletter', 'status'], 'integer'],
            [['firstname', 'lastname', 'firma', 'contact', 'banca', 'telefon'], 'string', 'max' => 255],
            [['cnp'], 'string', 'max' => 13],
            [['rc', 'cui', 'iban'], 'string', 'max' => 50],
            [['adresa'], 'string', 'max' => 4096],
            [['codpostal'], 'string', 'max' => 10],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            [['picture'], 'string', 'max' => 2048],
            
        ];
    } 
    
    
        /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'firstname'             => \Yii::t('app', 'Firstname'),
            'lastname'              => \Yii::t('app', 'Lastname'),
            'cnp'                   => \Yii::t('app', 'CNP'),
            'telefon'               => \Yii::t('app', 'Phone'),
            'tip'                   => \Yii::t('app', 'Type'),
            'cui'                   => \Yii::t('app', 'CUI'),
            'iban'                  => \Yii::t('app', 'IBAN'),
            'banca'                 => \Yii::t('app', 'Bank'),
            'contact'               => \Yii::t('app', 'Contact Person'),
            'adresa'                => \Yii::t('app', 'Address'),
            'codpostal'             => \Yii::t('app', 'Postal Code'),
            'judet'                 => \Yii::t('app', 'County'),
            'localitate'            => \Yii::t('app', 'City'),
            'newsletter'            => \Yii::t('app', 'Newsletter'),
            'status'                => \Yii::t('app', 'Status'),
            'picture'               => \Yii::t('app', 'Picture'),
            'locale'                => \Yii::t('app', 'Locale'),            
        
        ];
    }
    
    
    public function getFullName()
    {
        if($this->firstname || $this->lastname){
            return implode(' ', [$this->firstname, $this->lastname]);
        }
        return null;
    }    
    
}