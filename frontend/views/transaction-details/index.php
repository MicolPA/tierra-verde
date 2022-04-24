<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Paquetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">


    <h1><?= Html::encode($this->title) ?> <?= Html::a('Registrar paquetes', ['create'], ['class' => 'btn btn-success float-right btn-sm']) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="table-responsive bg-white p-2">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'state',
                        'payer_first_name',
                        'payer_last_name',
                        'payer_id',
                        'payer_email:email',
                        //'country_code',
                        //'invoice_number',
                        //'amount',
                        //'token',
                        //'procesado',
                        //'package_id',
                        //'client_id',
                        //'adults_count',
                        //'children_count',
                        //'total_amount',
                        //'date',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
