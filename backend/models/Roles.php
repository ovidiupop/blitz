<?php

namespace backend\models;

use Yii;
use dektrium\user\models\User;

/**
 * This is the model class for table "roles".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_type_id
 *
 * @property RoleTypes $roleType
 * @property User $user
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'unique'],
            [['user_id', 'role_type_id'], 'required'],
            [['user_id', 'role_type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Username'),
            'role_type_id' => Yii::t('app', 'Role'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleType()
    {
        return $this->hasOne(RoleTypes::className(), ['id' => 'role_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getUsername(){
        return \dektrium\user\models\User::find($this->user_id)->username;
    }
    
    public function getRole(){
        return $this->roleType->name;
    }
}
