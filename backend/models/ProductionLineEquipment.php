<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "production_line_equipment".
 *
 * @property int $production_line_id
 * @property int $equipment_id
 *
 * @property Equipment $equipment
 * @property ProductionLine $productionLine
 */
class ProductionLineEquipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_line_equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['production_line_id', 'equipment_id'], 'required'],
            [['production_line_id', 'equipment_id'], 'integer'],
            [['production_line_id', 'equipment_id'], 'unique', 'targetAttribute' => ['production_line_id', 'equipment_id']],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
            [['production_line_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductionLine::className(), 'targetAttribute' => ['production_line_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'production_line_id' => 'Production Line ID',
            'equipment_id' => 'Equipment ID',
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
}
