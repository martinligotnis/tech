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
     * @return void
     */
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['sum']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'equipment_id', 'production_line_id', 'unit_type_id', 'unit_service_interval', 'unit_installation_date', 'unit_last_maintenance', 'next_maintenance'], 'integer'],
            [['unit_name', 'unit_function', 'next_maintenance'], 'safe'],
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
        // find records, additionally selecting the sum of the 2 fields as 'next_maintenance'
        $query = Unit::find()->select('*, (`unit_last_maintenance` + `unit_service_interval`) AS `next_maintenance`');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // enable sorting for the related columns
        $dataProvider->sort->attributes['next_maintenance'] = [
            'asc' => ['next_maintenance' => SORT_ASC],
            'desc' => ['next_maintenance' => SORT_DESC],
        ];

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
            'production_line_id' => $this->production_line_id,
            'unit_type_id' => $this->unit_type_id,
            'unit_service_interval' => $this->unit_service_interval,
            'unit_installation_date' => $this->unit_installation_date,
            'unit_last_maintenance' => $this->unit_last_maintenance,
        ]);

        // if the sum has a numeric filter value set, apply the filter in the HAVING clause
        if (is_numeric($this->next_maintenance)) {
            $query->having([
                'next_maintenance' => $this->next_maintenance,
            ]);
        }

        $query->andFilterWhere(['like', 'unit_name', $this->unit_name])
            ->andFilterWhere(['like', 'unit_function', $this->unit_function]);

        return $dataProvider;
    }
}
