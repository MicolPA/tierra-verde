<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $cellphone
 * @property string $email
 * @property int $kid
 * @property int $type_id
 * @property int $package_id
 * @property int $pick_up_location_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Reservations[] $reservations
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'cellphone', 'email', 'kid', 'type_id', 'package_id', 'pick_up_location_id', 'created_at', 'updated_at'], 'required'],
            [['kid', 'type_id', 'package_id', 'pick_up_location_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'cellphone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'cellphone' => 'Cellphone',
            'email' => 'Email',
            'kid' => 'Kid',
            'type_id' => 'Type ID',
            'package_id' => 'Package ID',
            'pick_up_location_id' => 'Pick Up Location ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservations::className(), ['client_id' => 'id']);
    }
}
