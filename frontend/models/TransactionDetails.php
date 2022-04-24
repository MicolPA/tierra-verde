<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaction_details".
 *
 * @property int $id
 * @property string|null $state
 * @property string|null $payer_first_name
 * @property string|null $payer_last_name
 * @property string|null $payer_id
 * @property string|null $payer_email
 * @property string|null $country_code
 * @property string|null $invoice_number
 * @property int|null $amount
 * @property string|null $token
 * @property int|null $procesado
 * @property int|null $package_id
 * @property int|null $client_id
 * @property int|null $adults_count
 * @property int|null $children_count
 * @property int|null $total_amount
 * @property string|null $date
 */
class TransactionDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'procesado', 'package_id', 'client_id', 'adults_count', 'children_count', 'total_amount'], 'integer'],
            [['date'], 'safe'],
            [['state', 'payer_first_name', 'payer_last_name', 'payer_id', 'payer_email', 'country_code', 'invoice_number', 'token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'Status',
            'payer_first_name' => 'Nombre',
            'payer_last_name' => 'Apellido',
            'payer_id' => 'Payer ID',
            'payer_email' => 'Payer Email',
            'country_code' => 'Country Code',
            'invoice_number' => 'Invoice Number',
            'amount' => 'Monto total',
            'token' => 'Token',
            'procesado' => 'Procesado',
            'package_id' => 'Package ID',
            'client_id' => 'Client ID',
            'adults_count' => 'Adults',
            'children_count' => 'Children',
            'total_amount' => 'Total Amount',
            'date' => 'Fecha',
        ];
    }
}
