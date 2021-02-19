<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "production_line".
 *
 * @property int $id
 * @property string $name
 *
 * @property ProductionLineEquipment[] $productionLineEquipments
 * @property Equipment[] $equipment
 */
class ProductionLine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_line';
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
        return $this->hasMany(ProductionLineEquipment::className(), ['production_line_id' => 'id']);
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasMany(Equipment::className(), ['id' => 'equipment_id'])->viaTable('production_line_equipment', ['production_line_id' => 'id']);
    }
}
