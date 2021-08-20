<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Seo;

/**
 * SeoSearch represents the model behind the search form of `backend\models\Seo`.
 */
class SeoSearch extends Seo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'description_uz', 'description_ru', 'description_en', 'icon', 'og_image', 'og_type', 'keywords', 'author', 'reply_email', 'google_verify','yandex_verify', 'google_analytics', 'yandex_metrika', 'og_title_uz', 'og_title_ru', 'og_title_en', 'created_date'], 'safe'],
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
        $query = Seo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'status' => $this->status,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'og_image', $this->og_image])
            ->andFilterWhere(['like', 'og_type', $this->og_type])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'reply_email', $this->reply_email])
            ->andFilterWhere(['like', 'google_verify', $this->google_verify])
            ->andFilterWhere(['like', 'google_analytics', $this->google_analytics])
            ->andFilterWhere(['like', 'yandex_metrika', $this->yandex_metrika])
            ->andFilterWhere(['like', 'og_title_uz', $this->og_title_uz])
            ->andFilterWhere(['like', 'og_title_ru', $this->og_title_ru])
            ->andFilterWhere(['like', 'og_title_en', $this->og_title_en]);

        return $dataProvider;
    }
}
