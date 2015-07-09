<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "params".
 *
 * @property integer $id
 * @property string $app_id
 * @property string $name
 * @property string $value
 */
class Params extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'name', 'value'], 'required'],
            [['value'], 'string'],
            [['app_id', 'name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'app_id' => Yii::t('app', 'App ID'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
        ];
    }
    
    public static function arrApps(){
        return ['common'=>'common', 'frontend'=>'frontend', 'backend'=>'backend'];
    }
}
