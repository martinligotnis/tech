<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "maintenance".
 *
 * @property int $id
 * @property string|null $maintenance_date
 * @property int $equipment_id
 * @property int $unit_id
 * @property string|null $next_maintenance
 * @property string|null $need_of_monitoring
 *
 * @property Equipment $equipment
 * @property Unit $unit
 * @property MaintenanceSparePart[] $maintenanceSpareParts
 * @property SparePart[] $spareParts
 */
class Maintenance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['maintenance_date', 'next_maintenance'], 'safe'],
            [['equipment_id', 'unit_id'], 'required'],
            [['equipment_id', 'unit_id'], 'integer'],
            [['need_of_monitoring'], 'string'],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'maintenance_date' => 'Maintenance Date',
            'equipment_id' => 'Equipment ID',
            'unit_id' => 'Unit ID',
            'next_maintenance' => 'Next Maintenance',
            'need_of_monitoring' => 'Need Of Monitoring',
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
     * Gets query for [[Unit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

    /**
     * Gets query for [[MaintenanceSpareParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenanceSpareParts()
    {
        return $this->hasMany(MaintenanceSparePart::className(), ['maintenance_id' => 'id']);
    }

    /**
     * Gets query for [[SpareParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpareParts()
    {
        return $this->hasMany(SparePart::className(), ['id' => 'spare_part_id'])->viaTable('maintenance_spare_part', ['maintenance_id' => 'id']);
    }
}
