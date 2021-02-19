<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property int|null $equipment_id
 * @property string $name
 * @property string $function
 * @property int $service_interval
 * @property int $installation_date
 * @property int $last_maintenance
 *
 * @property SparePart[] $spareParts
 * @property Equipment $equipment
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
            [['equipment_id', 'unit_type_id', 'service_interval', 'installation_date', 'last_maintenance'], 'integer'],
            [['name', 'unit_type_id', 'function', 'service_interval', 'installation_date', 'last_maintenance'], 'required'],
            [['function'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment_id' => 'Equipment ID',
            'name' => 'Name',
            'function' => 'Function',
            'service_interval' => 'Service Interval',
            'installation_date' => 'Installation Date',
            'last_maintenance' => 'Last Maintenance',
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
