<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Equipment;

/**
 * EquipmentSearch represents the model behind the search form of `backend\models\Equipment`.
 */
class EquipmentSearch extends Equipment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['equipment_name', 'production_line_id'], 'safe'],
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
        $query = Equipment::find();

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

        $query->joinWith('productionLine');//pievieno 

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'production_line_id' => $this->production_line_id,
        ]);

        $query->andFilterWhere(['like', 'equipment_name', $this->equipment_name])
            ->andFilterWhere(['like', 'production_line.name', $this->production_line_id]);//production_line ir tabulas nosaukums un aiz punkta ir colonnas nosaukums

        return $dataProvider;
    }
}
