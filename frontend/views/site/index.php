<?php

$this->title = 'Home';

$user_id = isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : null;
?>

<style>
    
}
</style>
    
    <div class="jumbotron text-center bg-transparent bg-image bg-image-bottom position-relative divbackground pt-5 pb-5" id='fondo' style="background-image:url(/tour/frontend/web/images/slider-2.jpg);height: 720px;">
    <!-- <div class="jumbotron text-center bg-transparent bg-image pt-5 pb-5" id='fondo' style="background-image:url(/tour/frontend/web/images/slider-2.jpg);height:720px;background-position:bottom;background-repeat: no-repeat;background-size:cover;position: relative;padding-top: 5rem !important;margin-top: -15rem;"> -->
        <div class="align-middle h-100" style="padding-top: 15rem;">
           <h1 class="display-4 text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">AFFORDABLE TOURS</h1>

            <p class="lead text-white mb-4 position-relative">CITY TOURS / TOUR TICKETS / TOUR GUIDES</p>

            <p>
                <a class="btn btn-success pr-5 pl-5 font-weight-bold-2 position-relative mr-3 btn-sm" href="/tour/frontend/web/tourist-packages">VIEW TOURS</a>
                <a href="https://www.mitierraverde.com/about-us/" class="btn btn-outline-light border-white text-white pr-5 pl-5 font-weight-bold position-relative btn-sm" style="border:4px">ABOUT US</a>
            </p>  
        </div>
           
    </div>

    <div class="container-fluid p-0">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mt-3 mb-4">
                    <h2 class="h3 font-weight-bold">DOMINICAN REPUBLIC <span class="text-success">TOP</span> TOURS</h2>
                    <p class="text-muted h5 font-weight-normal">
                        Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Aliquam reprehenderit fugit labore ab eligendi nesciunt?
                    </p>
                </div>


                <?php foreach ($model as $m): ?>
                        
                    <div class="col-md-4 mb-3 rounded">
                        
                        <a class="text-dark text-decoration-none" href="/tour/frontend/web/tourist-packages/view?id=<?= $m->id ?>">
                                
                            <div class="p-2 rounded-top" style="background-image:url(/tour/frontend/web/<?= $m->image_1 ?>);height:250px;background-position:center;background-repeat: no-repeat;background-size:cover;">

                                <div style="height:200px">
                                    
                                </div>
                                <p class="text-right text-white rounded-bottom">
                                    <!-- <span class="h5 font-weight-normal">$</span><span class="h2">60</span> -->
                                </p>
                            </div>
                            <div class="div-gradient pl-2 pr-2">
                                <p class="h3 font-weight-bold text-white"><i class="modal-icon fa-xs mr-2"></i> <span class="modal-name"></span></p>
                                <span class="text-white">
                                    <i class="fas fa-church mr-2"></i> <span class="small">City tours</span>
                                </span>
                            </div>

                            <div class="bg-white p-2">
                                <span class="font-weight-bold small"><?= mb_strtoupper($m->name) ?></span>
                                <span class="small"><?= mb_strtoupper($m->type->name) ?></span>
                                <?php $favorite = \frontend\models\Favorite::find()->where(['package_id' => $m->id, 'user_id' => $user_id])->one(); ?>
                                <?php if ($favorite and $user_id): ?>
                                    <a href="/tour/frontend/web/tourist-packages/delete-favorite?id=<?= $favorite->id ?>"><span class="float-right text-muted"><i class="fas fa-heart text-danger"></i></span></a>
                                <?php else: ?>
                                    <a href="/tour/frontend/web/tourist-packages/set-favorite?id=<?= $m->id ?>"><span class="float-right text-muted"><i class="far fa-heart"></i></span></a>
                                <?php endif ?>
                            </div>

                        </a>

                    </div>

                <?php endforeach ?>

                <div class="col-md-12 text-center mt-5 mb-5">
                    <div>
                        <a href="/tour/frontend/web/tourist-packages" class="btn btn-success btn-sm pr-5 pl-5 font-weight-bold">VIEW ALL TOURS (<?= count($model) ?>)</a>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="bg-white pt-5 pb-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-12 text-center">
                        <h2 class="h3 font-weight-bold">OTHER <span class="text-success">POPULAR</span> TOURS</h2>
                        <p class="text-muted mb-5 h5 font-weight-normal">
                            Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Aliquam reprehenderit fugit labore ab eligendi nesciunt?
                        </p>
                    </div>

                    <?php for ($i=0; $i < 12; $i++): ?>
                        <div class="col-md-4 text-muted pr-4 pl-4">
                            <div class="border-bottom">
                                <p class="mt-2">
                                    <i class="fas fa-walking"></i> Walking tour <span class="float-right">$60</span>
                                </p>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-success p-4 mt-5 rounded">
                            <p class="h2 font-weight-normal text-white mb-0">
                                DISCOVER OUR TOP TOURS <span class="text-warning">from $34</span>
                                <a href="#" class="btn float-right bg-white mt-2 text-success font-weight-bold btn-md">READ MORE</a>
                            </p>
                            <p class="ml-5 text-white">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos, libero?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <?php for ($i=0; $i < 4; $i++): ?>
                        <div class="col-md-3">
                            <div class="p-2 rounded-top" style="background-image:url(/tour/frontend/web/images/stock-1.jpg);height:170px;background-position:center;background-repeat: no-repeat;background-size:cover;">
                                
                            </div>
                            <div class="p-2">
                                <p class="text-center font-weight-normal mb-1">
                                    <span class="text-success">
                                        Sightseen tour
                                    </span>
                                    booking
                                </p>
                                <p class="text-center small text-muted">
                                    Lorem ipsum dolor sit amet, consectetur, adipisicing elit. Tempora excepturi temporibus minima repellat libero delectus.
                                </p>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="jumbotron  text-center bg-transparent pt-5 pb-5" id='fondo' style="background-image:url(/tour/frontend/web/images/stock-3.jpg);height:400px;background-position:center;background-repeat: no-repeat;background-size:cover;position: relative;padding-top: 5rem !important;">
                    <div class="align-middle h-100" style="padding-top: 1rem;">
                       <h1 class="display-2 text-white font-weight-bold-2 position-relative mb-0" style="position: relative">BELONG ANYWHERE</h1>

                        <p class="lead text-white mb-4 position-relative">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae iste cupiditate enim.</p>

                        <p class="display-1 text-white position-relative mt-4">
                            <i class="far fa-play-circle"></i>
                        </p>  
                    </div>
                       
                </div>
            </div>
        </div>
        


        <div class="container">
            <div class="row mb-1 mt-5">
                <div class="col-md-12 text-center">
                    <h2 class="h3 font-weight-bold">SOME <span class="text-success">GOOD</span> REASONS</h2>
                    <p class="text-muted mb-5 h5 font-weight-normal">
                        Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Aliquam reprehenderit fugit labore ab eligendi nesciunt?
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="bg-white rounded text-center p-4 pt-5 pb-5">
                        <div class="display-1 w-fit-content text-success border rounded-circle pt-2 pb-2 pr-4 pl-4 m-auto">
                            <i class="fas fa-walking"></i>
                        </div>

                        <p class="font-weight-normal h4 mt-3">
                            <span class="text-success">+120</span>
                            <span>Premium tours</span>
                        </p>

                        <p class="text-center small text-muted">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Iure dolores, eligendi voluptates atque ipsa qui eius quidem, deleniti illum eaque.
                        </p>

                        <a href="" class="btn btn-outline-dark btn-sm font-weight-normal h4 pr-4 pl-4 mt-4">READ MORE</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white rounded text-center p-4 pt-5 pb-5">
                        <div class="display-1 w-fit-content text-success border rounded-circle pt-2 pb-2 pr-4 pl-4 m-auto">
                            <i class="fas fa-walking"></i>
                        </div>

                        <p class="font-weight-normal h4 mt-3">
                            <span class="text-success">+1000</span>
                            <span>Costumers</span>
                        </p>

                        <p class="text-center small text-muted">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Iure dolores, eligendi voluptates atque ipsa qui eius quidem, deleniti illum eaque.
                        </p>

                        <a href="" class="btn btn-outline-dark btn-sm font-weight-bold-2 pr-4 pl-4 mt-4">READ MORE</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white rounded text-center p-4 pt-5 pb-5">
                        <div class="display-1 w-fit-content text-success border rounded-circle pt-2 pb-2 pr-4 pl-4 m-auto">
                            <i class="fas fa-walking"></i>
                        </div>

                        <p class="font-weight-normal h4 mt-3">
                            <span class="text-success">H24</span>
                            <span>Support</span>
                        </p>

                        <p class="text-center small text-muted">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Iure dolores, eligendi voluptates atque ipsa qui eius quidem, deleniti illum eaque.
                        </p>

                        <a href="" class="btn btn-outline-dark btn-sm font-weight-bold-2 pr-4 pl-4 mt-4">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    <div style="height:400px"></div>
        


<!-- <div class="stars">
   <div class="stars-ghost">
      <div class="star"><i class="fas fa-star"></i></div>
      <div class="star"><i class="fas fa-star"></i></div>
      <div class="star"><i class="fas fa-star"></i></div>
      <div class="star"><i class="fas fa-star"></i></div>
      <div class="star"><i class="fas fa-star"></i></div>
   </div>
   <div class="star"><i class="far fa-star"></i></div>
   <div class="star"><i class="far fa-star"></i></div>
   <div class="star"><i class="far fa-star"></i></div>
   <div class="star"><i class="far fa-star"></i></div>
   <div class="star"><i class="far fa-star"></i></div>
   <div class="info">Hover Stars</div>
</div> -->