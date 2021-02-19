<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Unit;

/**
 * UnitSearch represents the model behind the search form of `backend\models\Unit`.
 */
class UnitSearch extends Unit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'equipment_id', 'unit_type_id', 'service_interval', 'installation_date', 'last_maintenance'], 'integer'],
            [['name', 'function'], 'safe'],
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
        $query = Unit::find();

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
            'equipment_id' => $this->equipment_id,
            'unit_type_id' => $this->unit_type_id,
            'service_interval' => $this->service_interval,
            'installation_date' => $this->installation_date,
            'last_maintenance' => $this->last_maintenance,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'function', $this->function]);

        return $dataProvider;
    }
}
