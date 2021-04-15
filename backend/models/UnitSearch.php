<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Unit;
use yii\db\ActiveQuery;

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
            [['id', 'unit_service_interval'], 'integer'],
            [['unit_name', 'unit_function', 'next_maintenance', 'unit_last_maintenance', 'unit_installation_date', 'unit_type_id', 'production_line_id', 'equipment_id'], 'safe'],
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
        $query = Unit::find()->select('
        unit.id, 
        unit.equipment_id, 
        unit.production_line_id, 
        unit.unit_type_id, 
        unit.unit_name, 
        unit.unit_function, 
        unit.unit_service_interval, 
        unit.unit_installation_date, 
        unit.unit_last_maintenance, 
        equipment.equipment_name AS equipment_name, 
        production_line.name AS line_name, 
        unit_type.name AS unit_type_name, 
        (unit_last_maintenance + unit_service_interval) AS `next_maintenance`');

        $query->joinWith('unitType')->joinWith('equipment')->joinWith('productionLine');

        //Var noderēt kaut kur kur sarežģītu query vajag

        // $sql = 'SELECT 
        // unit.unit_name, 
        // unit.unit_function, 
        // unit.unit_service_interval, 
        // unit.unit_installation_date, 
        // unit.unit_last_maintenance, 
        // equipment.equipment_name, 
        // production_line.name AS line_name, 
        // unit_type.name AS unit_type_name, 
        // (unit.unit_last_maintenance + unit.unit_service_interval) AS next_maintenance 
        // FROM unit u
        // LEFT JOIN equipment e ON u.equipment_id = e.id
        // LEFT JOIN production_line pl ON u.production_line_id = pl.id
        // LEFT JOIN unit_type ut ON u.unit_type_id = ut.id';

        // $query = Unit::findBySql($sql);

        //Un tests kā galā izskatās
        // echo $query->createCommand()->getRawSql(); exit();
                

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

        // if the sum has a numeric filter value set, apply the filter in the HAVING clause
        if (is_numeric($this->next_maintenance)) {
            $query->having([
                'next_maintenance' => $this->next_maintenance,
            ]);
        }

        $query->andFilterWhere ( [ 'OR' ,
            [ 'like' , 'unit_name' , $this->unit_name ],
            [ 'like' , 'unit_function' , $this->unit_function ],
            [ 'like' , 'unit_type.name' , $this->unit_type_id ],
            [ 'like' , 'production_line.name' , $this->production_line_id ],
            [ 'like' , 'equipment.equipment_name' , $this->equipment_id ],
        ] );

        return $dataProvider;
    }
}
