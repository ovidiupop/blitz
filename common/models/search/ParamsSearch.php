<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Params;

/**
 * ParamsSearch represents the model behind the search form about `common\models\Params`.
 */
class ParamsSearch extends Params
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['app_id', 'name', 'value'], 'safe'],
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
        $query = Params::find();

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
        ]);

        $query->andFilterWhere(['like', 'app_id', $this->app_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
