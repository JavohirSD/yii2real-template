<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Visitors;

/**
 * VisitorsSearch represents the model behind the search form of `backend\models\Visitors`.
 */
class VisitorsSearch extends Visitors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vpn', 'proxy', 'tor', 'visits', 'status'], 'integer'],
            [['ip_address', 'city', 'region', 'country', 'continent', 'country_code', 'latitude', 'longitude', 'time_zone', 'organisation', 'device', 'user_agent', 'browser', 'created_date', 'last_seen', 'operation_system', 'screen'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Visitors::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'vpn' => $this->vpn,
            'proxy' => $this->proxy,
            'tor' => $this->tor,
            'created_date' => $this->created_date,
            'last_seen' => $this->last_seen,
            'visits' => $this->visits,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'continent', $this->continent])
            ->andFilterWhere(['like', 'country_code', $this->country_code])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'time_zone', $this->time_zone])
            ->andFilterWhere(['like', 'organisation', $this->organisation])
            ->andFilterWhere(['like', 'device', $this->device])
            ->andFilterWhere(['like', 'user_agent', $this->user_agent])
            ->andFilterWhere(['like', 'browser', $this->browser])
            ->andFilterWhere(['like', 'operation_system', $this->operation_system])
            ->andFilterWhere(['like', 'screen', $this->screen]);

        return $dataProvider;
    }
}
