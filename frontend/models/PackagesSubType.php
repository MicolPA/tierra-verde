<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "packages_sub_type".
 *
 * @property int $id
 * @property string $name
 * @property int $icon_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Icon $icon
 * @property TouristPackages[] $touristPackages
 */
class PackagesSubType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages_sub_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['icon_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['icon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Icon::className(), 'targetAttribute' => ['icon_id' => 'id']],
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
            'icon_id' => 'Icon ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Icon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIcon()
    {
        return $this->hasOne(Icon::className(), ['id' => 'icon_id']);
    }

    /**
     * Gets query for [[TouristPackages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTouristPackages()
    {
        return $this->hasMany(TouristPackages::className(), ['sub_type_id' => 'id']);
    }
}
