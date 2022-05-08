<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TouristPackagesPayments;

/**
 * TouristPackagesPaymentsSearch represents the model behind the search form of `frontend\models\TouristPackagesPayments`.
 */
class TouristPackagesPaymentsSearch extends TouristPackagesPayments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'from', 'until', 'tourist_packages_id', 'location_id'], 'integer'],
            [['adults_amount', 'kids_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
    public function search($params, $id)
    {
        $query = TouristPackagesPayments::find()->where(['from' => 1]);

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
        $this->tourist_packages_id = $id;
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'from' => $this->from,
            'until' => $this->until,
            'adults_amount' => $this->adults_amount,
            'kids_amount' => $this->kids_amount,
            'tourist_packages_id' => $this->tourist_packages_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'location_id' => $this->location_id,
        ]);

        return $dataProvider;
    }
}
