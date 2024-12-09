<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "maintenance_action".
 *
 * @property int $id
 * @property string|null $action
 */
class MaintenanceAction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maintenance_action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['action'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action' => 'Action',
        ];
    }
}
