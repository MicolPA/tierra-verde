<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TouristPackages[] $touristPackages
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'created_at' => 'Creación',
            'updated_at' => 'Última actualización',
        ];
    }

    /**
     * Gets query for [[TouristPackages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTouristPackages()
    {
        return $this->hasMany(TouristPackages::className(), ['location_id' => 'id']);
    }
}
