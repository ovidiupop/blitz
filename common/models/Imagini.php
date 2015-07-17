<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "imagini".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property string $image
 * @property integer $order
 */
class Imagini extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagini';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'image', 'order'], 'required'],
            [['owner_id', 'order'], 'integer'],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'owner_id' => Yii::t('app', 'Owner ID'),
            'image' => Yii::t('app', 'Image'),
            'order' => Yii::t('app', 'Order'),
        ];
    }
}
