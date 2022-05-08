<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Salidas';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="tourist-packages-payments-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Registrar nueva salida', ['create', 'id' => $id], ['class' => 'btn btn-success float-right btn-sm']) ?></h1>

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
                        // 'from',
                        // 'until',
                        // 'adults_amount',
                        // 'kids_amount',
                        //'tourist_packages_id',
                        //'created_at',
                        //'updated_at',
                        //'location_id',
                        [
                            'format'=>'html',
                            'label' => '',
                            'attribute' => 'location_id',
                            'class' => 'yii\grid\DataColumn', 
                            'value' => function ($data) {
                                $location = \frontend\models\Location::findOne($data->location_id);
                                return $location ? $location->name : '';
                                // return $data->codigo_name;
                            },
                        ],

                        // [
                        //     'format'=>'html',
                        //     'label' => '',
                        //     'attribute' => 'location_id',
                        //     'class' => 'yii\grid\DataColumn', 
                        //     'value' => function ($data) {
                                
                        //     },
                        // ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
