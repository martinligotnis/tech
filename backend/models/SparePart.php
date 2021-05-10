<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "spare_part".
 *
 * @property int $id
 * @property string $part_name
 * @property string $producer
 * @property string $model
 * @property int $count
 * @property string|null $description
 * @property int $production_line_id
 * @property int $equipment_id
 * @property int $unit_id
 * @property int $unit_type_id
 * @property int $in_stock
 * @property int $min_stock_quantity
 *
 * @property Equipment $equipment
 * @property ProductionLine $productionLine
 * @property Unit $unit
 * @property UnitType $unitType
 */
class SparePart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spare_part';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['part_name', 'producer', 'model', 'count', 'production_line_id', 'equipment_id', 'unit_id', 'unit_type_id', 'in_stock', 'min_stock_quantity'], 'required'],
            [['count', 'production_line_id', 'equipment_id', 'unit_id', 'unit_type_id', 'in_stock', 'min_stock_quantity'], 'integer'],
            [['description'], 'string'],
            [['part_name', 'producer', 'model'], 'string', 'max' => 100],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
            [['production_line_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductionLine::className(), 'targetAttribute' => ['production_line_id' => 'id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unit_id' => 'id']],
            [['unit_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnitType::className(), 'targetAttribute' => ['unit_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'part_name' => 'Nosaukums',
            'producer' => 'Ražotājs',
            'model' => 'Modelis',
            'count' => 'Skaits',
            'description' => 'Apraksts',
            'production_line_id' => 'Ražošanas līnija',
            'equipment_id' => 'Līnijas iekārta',
            'unit_id' => 'Iekārtas mezgls',
            'unit_type_id' => 'Mezgla tips',
            'in_stock' => 'Noliktava',
            'min_stock_quantity' => 'Min skaits noliktavā',
        ];
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'equipment_id']);
    }

    /**
     * Gets query for [[ProductionLine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionLine()
    {
        return $this->hasOne(ProductionLine::className(), ['id' => 'production_line_id']);
    }

    /**
     * Gets query for [[Unit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

    /**
     * Gets query for [[UnitType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitType()
    {
        return $this->hasOne(UnitType::className(), ['id' => 'unit_type_id']);
    }
}
