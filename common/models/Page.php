<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $body
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() { return date('U'); }// unix timestamp
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'body', 'status'], 'required'],
            [['body'], 'string'],
            ['alias', 'unique'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['alias'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public function getStatusname(){
        return $this->statuses[$this->status];
    }
   
    protected function getStatuses(){
        return static::cmbStatuses();
    }
    
    public static function cmbStatuses(){
        return [0 => Yii::t('app', 'Draft'), 1 => Yii::t('app', 'Published')];
    }
    
    public function getSlug(){
        return \yii\helpers\Inflector::slug($this->title);
    }
    
    public function getSlugId(){
        return $this->slug .'-'.$this->id;
    }
}
