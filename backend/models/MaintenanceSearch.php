<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Maintenance;

/**
 * MaintenanceSearch represents the model behind the search form of `backend\models\Maintenance`.
 */
class MaintenanceSearch extends Maintenance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['maintenance_date', 'next_maintenance', 'need_of_monitoring', 'equipment_id', 'unit_id'], 'safe'],
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
        $query = Maintenance::find();
        $query
            ->joinWith('equipment')
            ->joinWith('unit');

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
            'maintenance_date' => $this->maintenance_date,
            'equipment_id' => $this->equipment_id,
            'unit_id' => $this->unit_id,
            'next_maintenance' => $this->next_maintenance,
        ]);

        $query->andFilterWhere(['like', 'need_of_monitoring', $this->need_of_monitoring]);

        return $dataProvider;
    }
}
