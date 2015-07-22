<?php
namespace common\models\user;

use dektrium\user\models\User as BaseUser;
use Yii;

class User extends BaseUser
{
    
    //return array('user_id'=>'role_type_id');
    protected function getRoles(){
      return \yii\helpers\ArrayHelper::map(\backend\models\Roles::find()->all(), 'user_id', 'role_type_id');
    }

    public function getUserRole(){
        $role = \backend\models\Roles::find()->where(['user_id'=>$this->id])->one();
        if($role){
            return $role->role;
        }else{
            return false;
        }
    }

    
    public function can($role){
        $user = \backend\models\Roles::find()->where(['user_id'=>$this->id])->one();
        
        if($user == null){
            return 0;
        }
        
        $userRole = $user->role_type_id;
        
        $hierarchy = \yii\helpers\ArrayHelper::map(\backend\models\RoleTypes::find()->all(), 'name', 'id');
        $idRole = $hierarchy[$role];
        return $userRole >= $idRole;
    }
    
    public function getIsAdmin(){
        if(Yii::$app->user->isGuest){
            return false;
        }
        return $this->can('admin');
    } 
    
    public function getIsMaster(){
        if(Yii::$app->user->isGuest){
            return false;
        }
        return $this->can('master');        
    }

    public function getIsOperator(){
        if(Yii::$app->user->isGuest){
            return false;
        }
        return $this->can('operator');        
    }
    
    public function getIsEditor(){
        if(Yii::$app->user->isGuest){
            return false;
        }
        return $this->can('editor');        
    }

//    public function getCanAdmin(){
//        return $this->userRole;
//    }

    public function getFullname(){
        return $this->profile->fullname;
    }
    
}