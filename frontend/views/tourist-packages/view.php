<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$cupo = $model->max_people;


$this->title = $model->name;
\yii\web\YiiAsset::register($this);


$fotos = array();
for ($i = 2; $i < 7; $i++) {
    
    if ($model["image_$i"]) {
        $fotos[] = $model["image_$i"];
    }
}
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

    .divimg{
        height: 100px !important;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .swal-overlay--show-modal .swal-modal{
        width: 60%;
        /*background: transparent;*/
    }

    .swal-icon:first-child{
        margin: 0px !important
    }

    .swal-footer{
        margin: 0px;
        background: white;
    }

    .swal-icon img{
        width: 100%;
    }
</style>

<div class="jumbotron text-left bg-transparent bg-image bg-image-bottom position-relative divbackground pt-5 pb-1" id='fondo' style="background-image:url(/tour/frontend/web/<?= $model->image_1 ?>);">
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
                    <p class="h3 font-weight-light">Fotos</p>
                </div>
                <div class="col-md-8 text-muted">
                    <div class="row">   
                        <?php $i =0; ?>
                            <?php foreach ($fotos as $foto): ?>
                                <?php $i++; ?>
                                <div class="col-md-4">  
                                        <a href="javascript:imgBigger('/tour/frontend/web/<?= $foto ?>')">
                                            <div class="mb-3 divimg rounded" style="background-image:url(/tour/frontend/web/<?= $foto ?>);">   
                                            
                                            </div>
                                        </a>
                                </div>  
                            <?php endforeach ?>
                    </div>  
                </div>
                <div class="col-md-4">
                    <p class="h3 font-weight-light">Description</p>
                </div>
                <div class="col-md-8 text-muted">
                        <div>
                            <?= $model->description ?>
                        </div>

                        <div class="row mt-3">
                            <?php if ($model->image_2): ?>
                                <div class="col-md-4">
                                    <div class="" style="height: 100px;background-size: cover;background-image:url(/tour/frontend/web/<?= $model->image_2?>);;">
                                        
                                    </div>
                                </div>
                            <?php endif ?>

                            <?php if ($model->image_3): ?>
                                <div class="col-md-4">
                                    <div class="" style="height: 100px;background-size: cover;background-image:url(/tour/frontend/web/<?= $model->image_3?>);;">
                                        
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if ($model->image_4): ?>
                                <div class="col-md-4">
                                    <div class="" style="height: 100px;background-size: cover;background-image:url(/tour/frontend/web/<?= $model->image_4?>);;">
                                        
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
            <?= $this->render('_book_aside', ['model' => $model]) ?>
            <div class="card mt-3">
                <div class="card-body text-center">
                   <p><i class="fas fa-headset display-2 text-muted"></i></p>
                   <p>Need <span class="text-success h6">help?</span></p>
                   <p class="text-success h4 mb-3"><?= Yii::$app->params['phone'] ?></p>
                   <p class="small text-muted">Lorem ipsum dolor sit, amet consectetur.</p>
                </div> 
            </div>
        </div>
    </div>

    
</div>


<script>

        function imgBigger(id){

            console.log(id);
            // img = $("#"+id);
            console.log(id);
            // url = img.children().attr('src');
            swal({
                title: "",
                text: '',
                icon: id,
              });

        }
</script>