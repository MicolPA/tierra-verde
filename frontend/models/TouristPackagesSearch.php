<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TouristPackages;

/**
 * TouristPackagesSearch represents the model behind the search form of `frontend\models\TouristPackages`.
 */
class TouristPackagesSearch extends TouristPackages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type_id', 'location_id', 'kids', 'age_restricted'], 'integer'],
            [['pick_up_location_id', 'created_at', 'updated_at'], 'safe'],
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
        $get = Yii::$app->request->get();
        $query = TouristPackages::find()->orderBy(['id' => SORT_DESC]);

        if (isset($get['sub_type_id'])) {
            if ($get['sub_type_id']) {
                $this->sub_type_id = $get['sub_type_id'];
            }
        }

        if (isset($get['star_rating'])) {
            if ($get['star_rating']) {
                $this->rating = $get['star_rating'];
            }
        }

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
            'name' => $this->name,
            'type_id' => $this->type_id,
            'rating' => $this->rating,
            'location_id' => $this->location_id,
            'kids' => $this->kids,
            'sub_type_id' => $this->sub_type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pick_up_location_id', $this->pick_up_location_id]);

        return $dataProvider;
    }
}
