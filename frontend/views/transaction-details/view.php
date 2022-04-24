<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "$model->payer_first_name $model->payer_last_name";
$client = \frontend\models\Clients::findOne($model->client_id);

\yii\web\YiiAsset::register($this);
?>
<div class="transaction-details-view">

    <div class="col-md-12">
        <p class="mb-3 display-4"></p>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Información de pago (PAYPAL)</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Información del usuario</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane bg-white fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id',
                        'state',
                        'payer_first_name',
                        'payer_last_name',
                        'payer_id',
                        'payer_email:email',
                        'country_code',
                        'invoice_number',
                        // 'amount',
                        // 'token',
                        // 'procesado',
                        'package_id',
                        [
                            'format'=>'html',
                            'attribute' => 'package_id',
                            'label' => 'Paquete',
                            'class' => 'yii\grid\DataColumn', 
                            'value' => function ($data) {
                                $temp = \frontend\models\TouristPackages::findOne($data->package_id);
                                return Html::a("<span class='font-weight-bold'>".$temp['name'] . '<i class="fas fa-external-link-alt ml-2"></i></span>', ['tourist-packages/view', 'id' => $temp['id']], ['target' => '_blank']);
                                // return $data->codigo_name;
                            },
                        ],
                        // 'client_id',
                        'adults_count',
                        'children_count',
                        'total_amount',
                        'date',
                    ],
                ]) ?>
            </div>
            <div class="tab-pane fade bg-white" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <?= DetailView::widget([
                    'model' => $client,
                    'attributes' => [
                        // 'id',
                        'first_name',
                        'last_name',
                        'cellphone',
                        'email:email',
                        'pick_up_location_id',
                        // 'location_id',
                        // 'client_id',
                        'created_at',
                    ],
                ]) ?>
          </div>
        </div>
    </div>

</div>
