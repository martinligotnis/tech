<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property int $equipment_id
 * @property int $production_line_id
 * @property string $name
 * @property int $unit_type_id
 * @property string $function
 * @property int $service_interval
 * @property int $installation_date
 * @property int $last_maintenance
 *
 * @property SparePart[] $spareParts
 * @property Equipment $equipment
 * @property ProductionLine $productionLine
 * @property UnitType $unitType
 * @property UnitEquipment[] $unitEquipments
 * @property Equipment[] $equipment0
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_id', 'production_line_id', 'name', 'unit_type_id', 'function', 'service_interval', 'installation_date', 'last_maintenance'], 'required'],
            [['equipment_id', 'production_line_id', 'unit_type_id', 'service_interval', 'installation_date', 'last_maintenance'], 'integer'],
            [['function'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
            [['production_line_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductionLine::className(), 'targetAttribute' => ['production_line_id' => 'id']],
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
            'equipment_id' => 'Iekārta',
            'production_line_id' => 'Ražošanas līnija',
            'name' => 'Nosaukums',
            'unit_type_id' => 'Mezgla tips',
            'function' => 'Funkcija',
            'service_interval' => 'Apkopes intervāls (stundās)',
            'installation_date' => 'Uzstādīšanas datums',
            'last_maintenance' => 'Pēdējā apkope',
        ];
    }

    /**
     * Gets query for [[SpareParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpareParts()
    {
        return $this->hasMany(SparePart::className(), ['unit_id' => 'id']);
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
     * Gets query for [[UnitType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitType()
    {
        return $this->hasOne(UnitType::className(), ['id' => 'unit_type_id']);
    }

    /**
     * Gets query for [[UnitEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitEquipments()
    {
        return $this->hasMany(UnitEquipment::className(), ['unit_id' => 'id']);
    }

    /**
     * Gets query for [[Equipment0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment0()
    {
        return $this->hasMany(Equipment::className(), ['id' => 'equipment_id'])->viaTable('unit_equipment', ['unit_id' => 'id']);
    }
}
