<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Telegram;

/**
 * TelegramSearch represents the model behind the search form of `backend\models\Telegram`.
 */
class TelegramSearch extends Telegram
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['bot_token', 'feedback_group', 'payment_group', 'main_channel', 'info_channel', 'admin_username', 'moder_username', 'current_host', 'created_date', 'updated_date', 'bot_username'], 'safe'],
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
        $query = Telegram::find();

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
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'bot_token', $this->bot_token])
            ->andFilterWhere(['like', 'feedback_group', $this->feedback_group])
            ->andFilterWhere(['like', 'payment_group', $this->payment_group])
            ->andFilterWhere(['like', 'main_channel', $this->main_channel])
            ->andFilterWhere(['like', 'info_channel', $this->info_channel])
            ->andFilterWhere(['like', 'admin_username', $this->admin_username])
            ->andFilterWhere(['like', 'moder_username', $this->moder_username])
            ->andFilterWhere(['like', 'current_host', $this->current_host])
            ->andFilterWhere(['like', 'bot_username', $this->bot_username]);

        return $dataProvider;
    }
}
