<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "spare_part_pictures".
 *
 * @property int $id
 * @property int $spare_part_id
 * @property string $url
 * @property string $picture_name
 *
 * @property SparePart $sparePart
 */
class SparePartPictures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spare_part_pictures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['spare_part_id'], 'integer'],
            [['url'], 'string', 'max' => 500],
            [['picture_name'], 'string', 'max' => 100],
            [['spare_part_id', 'url', 'picture_name'], 'safe'],
            [['spare_part_id'], 'exist', 'skipOnError' => true, 'targetClass' => SparePart::className(), 'targetAttribute' => ['spare_part_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'spare_part_id' => 'Spare Part ID',
            'url' => 'Url',
            'picture_name' => 'Picture Name',
        ];
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
