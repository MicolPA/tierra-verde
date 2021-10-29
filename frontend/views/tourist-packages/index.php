<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TouristPackagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tourist Packages';
$this->params['breadcrumbs'][] = $this->title;

$img = "https://i2.wp.com/www.mitierraverde.com/wp-content/uploads/2021/09/piqsels.com-id-snujj.jpg?fit=1920%2C1080&ssl=1";
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tourist Packages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <?php for ($i=0;$i<13;$i++): ?>

            <div class="col-md-4 mb-3 rounded-end">
                <div class="shadow">
                    <div class="rounded-top" style="background-image: url(<?= $img ?>);background-size: cover;background-position: center;background-repeat: no-repeat;height: 250px;">
                    
                    </div>
                    <div class="bg-white p-4">
                        <p class="h6">Wonders of the South and North</p>
                        <p class="text-muted">
                            Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Delectus, excepturi.
                        </p>
                        <p class="text-right">
                            <a href="#" class="btn text-white font-weight-bold btn-warning rounded-4 pl-3 pr-3">BOOK NOW</a>
                        </p>
                    </div>
                </div>
            </div>
            
        <?php endfor ?>
    </div>


</div>
