<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 */
class Pair extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pair';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['name'], 'unique', 'message'=>Yii::t('app', '{attribute} must be unique!')],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
        ];
    }
}
