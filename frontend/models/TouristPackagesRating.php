<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tourist_packages_rating".
 *
 * @property int $id
 * @property float|null $rating
 * @property int|null $tourist_packages_id
 * @property int|null $user_id
 * @property string|null $created_at
 */
class TouristPackagesRating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tourist_packages_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rating'], 'number'],
            [['tourist_packages_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rating' => 'Rating',
            'tourist_packages_id' => 'Tourist Packages ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }
}
