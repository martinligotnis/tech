<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property string $name
 * @property int $unit_type_id
 * @property string $function
 * @property int $service_interval
 * @property int $installation_date
 * @property int $last_maintenance
 *
 * @property UnitType $unitType
 * @property UnitEquipment[] $unitEquipments
 * @property Equipment[] $equipment
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
            [['name', 'unit_type_id', 'function', 'service_interval', 'installation_date', 'last_maintenance'], 'required'],
            [['unit_type_id', 'service_interval', 'installation_date', 'last_maintenance'], 'integer'],
            [['function'], 'string'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'unit_type_id' => 'Unit Type ID',
            'function' => 'Function',
            'service_interval' => 'Service Interval',
            'installation_date' => 'Installation Date',
            'last_maintenance' => 'Last Maintenance',
        ];
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
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasMany(Equipment::className(), ['id' => 'equipment_id'])->viaTable('unit_equipment', ['unit_id' => 'id']);
    }
}
