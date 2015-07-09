<?php
namespace common\models\user;

use yii\data\ActiveDataProvider;
use dektrium\user\models\UserSearch as UserSearchBase;
class UserSearch extends UserSearchBase
{

    /** @inheritdoc */
    public function rules()
    {
        return [
            'fieldsSafe' => [['username', 'email','registration_ip', 'created_at'], 'safe'],
            'createdDefault' => ['created_at', 'default', 'value' => null],

        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'username'        => \Yii::t('user', 'Username'),
            'email'           => \Yii::t('user', 'Email'),
            'created_at'      => \Yii::t('user', 'Registration time'),
            'registration_ip' => \Yii::t('user', 'Registration ip'),
            'userRole'        => \Yii::t('app', 'Role'),
        ];
    }

    public function search($params)
    {
        $query = $this->finder->getUserQuery();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->joinWith('role_types');
        
        if ($this->created_at !== null) {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
        }
        
        
        $query->andFilterWhere([
            'roles.user_id'=> $this->userRole,
        ]);
        
        $query->andFilterWhere(['like', 'username', $this->username])
//            ->andFilterWhere(['like', 'role_types.name', $this->userRole])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['registration_ip' => $this->registration_ip]);

        return $dataProvider;
    }
}
