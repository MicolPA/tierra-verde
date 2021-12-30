<?php

use kartik\rating\StarRating;
$this->title = 'Tourist Packages';

?>
<div class="jumbotron text-center bg-transparent bg-image bg-image-bottom position-relative divbackground pt-5 pb-5" id='fondo' style="background-image:url(/tour/frontend/web/images/stock-3.jpg);">
    <div class="align-middle h-100" style="padding-top: 15rem;">
       <h1 class="display-4 text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">TOURIST PACKAGES</h1>
        <p class="lead text-white mb-4 position-relative">CITY TOURS / TOUR TICKETS / TOUR GUIDES</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3 text-gray">
            <?= $this->render('_aside', ['model' => $searchModel]) ?>
        </div>
        <div class="col-md-9">
            <?php foreach ($dataProvider->query->all() as $m): ?>
                <div class="row bg-white p-0 mb-3">
                    <div class="col-md-4 p-0">
                        <div class="w-100 bg-image" style="height:200px;background-image:url('/tour/frontend/web/<?= $m->image_1 ?>')">

                            <div style="height:200px">
                                
                            </div>
                            <p class="text-right text-white rounded-bottom">
                                <!-- <span class="h5 font-weight-normal">$</span><span class="h2">60</span> -->
                            </p>
                        </div>
                        <div class="div-gradient pl-2 pr-2">
                            <p class="h3 font-weight-bold text-white"><i class="modal-icon fa-xs mr-2"></i> <span class="modal-name"></span></p>
                            <span class="text-white">
                                <?php if (isset($m->subtype->name)): ?>
                                    <i class="fas fa-church mr-2"></i> <span class="small"><?= $m->subtype->name ?></span>
                                <?php endif ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-8 p-3 pt-4 pb-4">
                        <p class="text-uppercase h4">
                            <?= StarRating::widget([
                                'name' => 'star_rating--',
                                'value' => $m->rating,
                                'pluginOptions' => [
                                    'displayOnly' => true,
                                    'theme' => 'krajee-uni',
                                    'filledStar' => '<i class="fas fa-star"></i>',
                                    'emptyStar' => '<i class="far fa-star"></i>',
                                    ]
                                ]);
                             ?> 
                            <span class="font-weight-bold"><?= $m->name ?></span> <span class="font-weight-lighter"><?= $m->type->name ?></span> 
                            <p class="text-muted mt-3">
                                <?= $m->short_description ?>
                            </p>
                        </p>

                        <div class="mt-2">
                            <a href="/tour/frontend/web/tourist-packages/view?id=<?= $m->id ?>" class="btn btn-success btn-sm float-right">DETAILS </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</div>