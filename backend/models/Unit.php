<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property int $equipment_id
 * @property int $production_line_id
 * @property string $unit_name
 * @property int $unit_type_id
 * @property string $unit_function
 * @property int $unit_service_interval
 * @property int $unit_installation_date
 * @property int $unit_last_maintenance
 * @property int $next_maintenance
 * @property int $extra_maintenance
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
    public $next_maintenance;

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
            [['equipment_id', 'production_line_id', 'unit_name', 'unit_type_id', 'unit_function', 'unit_service_interval', 'unit_installation_date', 'unit_last_maintenance'], 'required'],
            [['equipment_id', 'production_line_id', 'unit_type_id', 'extra_maintenance'], 'integer'],
            [['unit_service_interval', 'unit_last_maintenance', 'unit_installation_date'], 'safe'],
            [['unit_function'], 'string'],
            [['unit_name'], 'string', 'max' => 100],
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
            'unit_name' => 'Mezgla/materiāla nosaukums',
            'unit_type_id' => 'Mezgla tips',
            'unit_function' => 'Funkcija',
            'unit_service_interval' => 'Apkopes intervāls (stundās)',
            'unit_installation_date' => 'Uzstādīšanas datums',
            'unit_last_maintenance' => 'Pēdējā apkope',
            'next_maintenance' => 'Nākamā apkope',
            'extra_maintenance' => 'Ārkārtas apkope (stundas)',
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

    // public function getNextMaintenance(){
    //     $this->next_maintenance = 0;

    //     if (is_numeric($this->unit_last_maintenance) && is_numeric($this->unit_service_interval)) {
    //         $this->next_maintenance = $this->unit_last_maintenance + $this->unit_service_interval;
    //     }

    //     return $this->next_maintenance;
    // }
}
