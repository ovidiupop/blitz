<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "judet".
 *
 * @property integer $id
 * @property string $nume
 * @property string $cod
 *
 * @property Localitate[] $localitates
 */
class Judet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'judet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nume', 'cod'], 'required'],
            [['nume'], 'string', 'max' => 255],
            [['cod'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nume' => 'Nume',
            'cod' => 'Cod',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitates()
    {
        return $this->hasMany(Localitate::className(), ['judet' => 'id']);
    }
}
