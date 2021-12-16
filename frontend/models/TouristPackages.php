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
            [['type_id', 'location_id', 'kids', 'age_restricted'], 'integer'],
            [['created_at', 'updated_at', 'short_description', 'description', 'kids_age_min', 'kids_age_max', 'max_people', 'sub_type_id', 'rating'], 'safe'],
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
            'name' => 'Nombre',
            'type_id' => 'Tipo',
            'location_id' => 'Ubicación',
            'kids' => '¿Niños permitidos?',
            'age_restricted' => 'Edad mínima permitida',
            'kids_age_min' => 'Edad mínima niños',
            'kids_age_max' => 'Edad máxima niños',
            'pick_up_location_id' => 'Ubicación de salida',
            'created_at' => 'Creación',
            'updated_at' => 'Última actualización',
            'sub_type_id' => 'Subcategoría',
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

    public function getLocationPickup()
    {
        return $this->hasOne(Location::className(), ['id' => 'pick_up_location_id']);
    }

    public function getSubtype()
    {
        return $this->hasOne(PackagesSubType::className(), ['id' => 'sub_type_id']);
    }
}
