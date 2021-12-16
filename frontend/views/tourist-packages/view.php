<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$cupo = $model->max_people;


$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>

<style>
    tr{
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
    }
    td{
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
    }
</style>

<div class="jumbotron text-left bg-transparent bg-image bg-image-bottom position-relative divbackground pt-5 pb-1" id='fondo' style="background-image:url(/frontend/web/<?= $model->image_1 ?>);">
    <div class="container">
        <div class="align-middle h-100" style="padding-top: 20rem;">
            <h1 class="display-4 text-uppercase text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">
                <?= $model->name ?>
            </h1>
            <p class="lead text-white mb-4 position-relative small">CITY TOURS / TOUR TICKETS / TOUR GUIDES</p>
        </div>
    </div>
</div>
<div class="container">

    <div class="row pb-5">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <p class="h3 font-weight-light">Description</p>
                </div>
                <div class="col-md-8 text-muted">
                        <?= $model->description ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?= $this->render('_book_aside', ['model' => $model]) ?>
        </div>
    </div>

    <div class="d-none">
        <p class="text-muted">
            <?= $model->description ?>
        </p>
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'type_id',
            'location_id',
            'kids',
            'age_restricted',
            'description',
            'pick_up_location_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    </div>
</div>
