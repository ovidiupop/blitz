<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Produs as ProdusModel;

/**
 * Produs represents the model behind the search form about `common\models\Produs`.
 */
class Produs extends ProdusModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order'], 'integer'],
            [['denumire', 'imagine', 'extra'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProdusModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'denumire', $this->denumire])
            ->andFilterWhere(['like', 'imagine', $this->imagine])
            ->andFilterWhere(['like', 'extra', $this->extra]);

        return $dataProvider;
    }
}
