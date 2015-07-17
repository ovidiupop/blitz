<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produs".
 *
 * @property integer $id
 * @property string $denumire
 * @property integer $order
 * @property string $imagine
 * @property string $extra
 */
class Produs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['denumire', 'order', 'imagine', 'extra'], 'required'],
            [['order'], 'integer'],
            [['denumire', 'imagine', 'extra'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'denumire' => Yii::t('app', 'Denumire'),
            'order' => Yii::t('app', 'Order'),
            'imagine' => Yii::t('app', 'Imagine'),
            'extra' => Yii::t('app', 'Extra'),
        ];
    }
}
