<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "spare_part".
 *
 * @property int $id
 * @property string $producer
 * @property string $model
 * @property string|null $description
 * @property int $unit_type_id
 * @property int $unit_id
 *
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
            [['producer', 'model', 'unit_type_id', 'unit_id'], 'required'],
            [['description'], 'string'],
            [['unit_type_id', 'unit_id'], 'integer'],
            [['producer', 'model'], 'string', 'max' => 100],
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
            'producer' => 'Producer',
            'model' => 'Model',
            'description' => 'Description',
            'unit_type_id' => 'Unit Type ID',
            'unit_id' => 'Unit ID',
        ];
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
