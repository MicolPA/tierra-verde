<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "packages_type".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TouristPackages[] $touristPackages
 */
class PackagesType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages_type';
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
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TouristPackages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTouristPackages()
    {
        return $this->hasMany(TouristPackages::className(), ['type_id' => 'id']);
    }
}
