<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ubicaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">


    <h1><?= Html::encode($this->title) ?> <?= Html::a('Registrar ubicación', ['create'], ['class' => 'btn btn-success float-right btn-sm']) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="table-responsive bg-white p-2">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'name',
                        'created_at',
                        'updated_at',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
