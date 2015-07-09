<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localitate".
 *
 * @property integer $id
 * @property integer $judet
 * @property string $nume
 *
 * @property Judet $judetul
 */
class Localitate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localitate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judet', 'nume'], 'required'],
            [['judet'], 'integer'],
            [['nume'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judet' => 'Judet',
            'nume' => 'Nume',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJudetul()
    {
        return $this->hasOne(Judet::className(), ['id' => 'judet']);
    }
    
    public function getNumeJudet(){
        return $this->judetul->nume;
    }
}
