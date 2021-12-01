<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "icon".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property PackagesSubType[] $packagesSubTypes
 */
class Icon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'icon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * Gets query for [[PackagesSubTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackagesSubTypes()
    {
        return $this->hasMany(PackagesSubType::className(), ['icon_id' => 'id']);
    }
}
