<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $name
 *
 * @property ProductionLineEquipment[] $productionLineEquipments
 * @property ProductionLine[] $productionLines
 * @property UnitEquipment[] $unitEquipments
 * @property Unit[] $units
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
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
        ];
    }

    /**
     * Gets query for [[ProductionLineEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionLineEquipments()
    {
        return $this->hasMany(ProductionLineEquipment::className(), ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[ProductionLines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionLines()
    {
        return $this->hasMany(ProductionLine::className(), ['id' => 'production_line_id'])->viaTable('production_line_equipment', ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[UnitEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitEquipments()
    {
        return $this->hasMany(UnitEquipment::className(), ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[Units]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['id' => 'unit_id'])->viaTable('unit_equipment', ['equipment_id' => 'id']);
    }
}
