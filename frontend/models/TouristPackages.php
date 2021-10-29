<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tourist_packages".
 *
 * @property int $id
 * @property int $name
 * @property int $type_id
 * @property int $location_id
 * @property int $kids
 * @property int $age_restricted
 * @property string $pick_up_location_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Location $location
 * @property Reservations[] $reservations
 * @property PackagesType $type
 */
class TouristPackages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tourist_packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type_id', 'location_id', 'age_restricted', 'pick_up_location_id', 'created_at', 'updated_at'], 'required'],
            [['name', 'type_id', 'location_id', 'kids', 'age_restricted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['pick_up_location_id'], 'string', 'max' => 255],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PackagesType::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => 'Type ID',
            'location_id' => 'Location ID',
            'kids' => 'Kids',
            'age_restricted' => 'Age Restricted',
            'pick_up_location_id' => 'Pick Up Location ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservations::className(), ['package_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PackagesType::className(), ['id' => 'type_id']);
    }
}
