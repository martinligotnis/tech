<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "maintenance_spare_part".
 *
 * @property int $spare_part_id
 * @property int $maintenance_id
 * @property int|null $maintenance_action_id
 * @property string|null $notes
 * @property string|null $constant_monitoring
 *
 * @property Maintenance $maintenance
 * @property SparePart $sparePart
 */
class MaintenanceSparePart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maintenance_spare_part';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['spare_part_id', 'maintenance_id'], 'required'],
            [['spare_part_id', 'maintenance_id', 'maintenance_action_id'], 'integer'],
            [['notes', 'constant_monitoring'], 'string'],
            [['spare_part_id', 'maintenance_id'], 'unique', 'targetAttribute' => ['spare_part_id', 'maintenance_id']],
            [['maintenance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Maintenance::className(), 'targetAttribute' => ['maintenance_id' => 'id']],
            [['spare_part_id'], 'exist', 'skipOnError' => true, 'targetClass' => SparePart::className(), 'targetAttribute' => ['spare_part_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'spare_part_id' => 'Spare Part ID',
            'maintenance_id' => 'Maintenance ID',
            'maintenance_action_id' => 'Maintenance Action ID',
            'notes' => 'Notes',
            'constant_monitoring' => 'Constant Monitoring',
        ];
    }

    /**
     * Gets query for [[Maintenance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenance()
    {
        return $this->hasOne(Maintenance::className(), ['id' => 'maintenance_id']);
    }

    /**
     * Gets query for [[SparePart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSparePart()
    {
        return $this->hasOne(SparePart::className(), ['id' => 'spare_part_id']);
    }
}
