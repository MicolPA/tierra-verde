<?php

$this->title = 'My Yii Application';

?>

<style>
    #fondo:before {
    content:'';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0,0,0,0.5);
    padding-top: 4rem;
}
</style>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent pt-5 pb-5" id='fondo' style="background-image:url(/frontend/web/images/slider-2.jpg);height:700px;background-position:bottom;background-repeat: no-repeat;background-size:cover;position: relative;padding-top: 5rem !important;margin-top: -15rem;">
        <div class="align-middle h-100" style="padding-top: 15rem;">
           <h1 class="display-4 text-white font-weight-bold-2 position-relative mb-0" style="position: relative">AFFORDABLE TOURS</h1>

            <p class="lead text-white mb-4 position-relative">CITY TOURS / TOUR TICKETS / TOUR GUIDES</p>

            <p>
                <a class="btn btn-success pr-5 pl-5 font-weight-bold-2 position-relative" href="http://www.yiiframework.com">VIEW TOURS</a>
                <button type="button" class="btn btn-outline-light border-white text-white pr-5 pl-5 font-weight-bold position-relative" style="border:4px">VIEW TICKETS</button>
            </p>  
        </div>
           
    </div>

    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center mt-2 mb-4">
                <h2 class="h3 font-weight-bold">DOMINICAN REPUBLIC <span class="text-success">TOP</span> TOURS</h2>
                <p class="text-muted">
                    Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Aliquam reprehenderit fugit labore ab eligendi nesciunt?
                </p>
            </div>


            <?php for ($i=0;$i<13;$i++): ?>
                
                <div class="col-md-4 mb-3 border-rounded">
                    <div style="background-image:url(/frontend/web/images/stock-1.jpg);height:200px;background-position:center;background-repeat: no-repeat;background-size:cover;">
                        
                    </div>

                    <div class="bg-white p-2">
                        <span class="font-weight-bold small">SENNA RIVER</span>
                        <span class="small">TOUR</span>
                        <span class="float-right text-muted"><i class="far fa-heart"></i></span>

                    </div>

                </div>

            <?php endfor ?>
            
        </div>

    </div>
</div>
<div class="stars">
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
</div>