<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tourist_packages_payments".
 *
 * @property int $id
 * @property int $from
 * @property int $until
 * @property int $adults_amount
 * @property int $kids_amount
 * @property int $tourist_packages_id
 * @property string $created_at
 * @property string $updated_at
 */
class TouristPackagesPayments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tourist_packages_payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'until', 'tourist_packages_id', 'created_at', 'updated_at'], 'required'],
            [['from', 'until', 'tourist_packages_id'], 'integer'],
            [['created_at', 'updated_at', 'adults_amount', 'kids_amount',], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'until' => 'Until',
            'adults_amount' => 'Adults Amount',
            'kids_amount' => 'Kids Amount',
            'tourist_packages_id' => 'Tourist Packages ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
