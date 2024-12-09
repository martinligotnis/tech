<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SparePart;

/**
 * SparePartSearch represents the model behind the search form of `backend\models\SparePart`.
 */
class SparePartSearch extends SparePart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count', 'in_stock', 'min_stock_quantity'], 'integer'],
            [['part_name', 'producer', 'model', 'description', 'production_line_id', 'equipment_id', 'unit_id', 'unit_type_id'], 'safe'],
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
    public function search($params, $pageSize = 50)
    {
        $query = SparePart::find()->select('
        spare_part.id, 
        spare_part.part_name, 
        spare_part.producer, 
        spare_part.model, 
        spare_part.count, 
        spare_part.description, 
        spare_part.production_line_id, 
        spare_part.equipment_id, 
        spare_part.unit_id, 
        spare_part.unit_type_id, 
        spare_part.in_stock, 
        spare_part.min_stock_quantity, 
        equipment.equipment_name AS equipment_name, 
        production_line.name AS line_name, 
        unit_type.name AS unit_type_name, 
        unit.unit_name AS unit_name');

        $query->joinWith('equipment')->joinWith('productionLine')->joinWith('unitType')->joinWith('unit');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,  // no pagination if it is 0
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere ( [ 'OR' ,
            [ 'like' , 'part_name' , $this->part_name ],
            [ 'like' , 'in_stock' , $this->in_stock ],
            [ 'like' , 'min_stock_quantity' , $this->min_stock_quantity ],
            [ 'like' , 'producer' , $this->producer ],
            [ 'like' , 'model' , $this->model ],
            [ 'like' , 'count' , $this->count ],
            [ 'like' , 'unit_type.name' , $this->unit_type_id ],
            [ 'like' , 'production_line.name' , $this->production_line_id ],
            [ 'like' , 'equipment.equipment_name' , $this->equipment_id ],
            [ 'like' , 'unit.unit_name' , $this->unit_id ],
        ] );

        return $dataProvider;
    }
}
