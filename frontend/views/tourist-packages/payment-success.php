<?php 

$this->title = "Payment successful";
?>

<div class="jumbotron mb-0 text-center bg-transparent bg-image position-relative divbackground pt-5 pb-5" id='fondo' style="background-image:url(/tour/frontend/web/images/stock-4.jpg);">
    <div class="align-middle h-100" style="padding-top: 10rem;">
       <h1 class="display-4 text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">PAYMENT SUCCESSFUL</h1>
        <p class="lead text-white mb-4 position-relative">YOUR BOOKING | PURCHASE DETAILS</p>
    </div>
</div>
<div class="bg-white pt-2 pb-2 mb-5">
   <div class="container">
      <p class="mb-0">
         <a href="/" class="text-decoration-none mr-2 text-muted">Home</a>
         <span class="text-muted mr-1 ml-1">></span> 
         <a href="#" class="text-decoration-none mr-2 text-muted">Category</a>
         <span class="text-muted mr-1 ml-1">></span> 
         <a href="#" class="text-decoration-none mr-2 text-dark">Finish</a>

      </p>
   </div>
</div>



<div class="container">
   <div class="row">
      <div class="col-md-8">
         <div class="row book-content">
            <div class="col-md-12 w-100 mr-xs-2">
               <div class="book-numbers bg-success rounded-circle pl-3 pr-3 font-weight-bold text-white d-inline-block position-absolute">
                  1
               </div>
               <div class="book-detail mb-4">
                  <p class="font-weight-light h3">
                     Thank you - Your booking is confirmed
                  </p>

                  <p class="text-muted mt-3">
                     Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio, aliquid perspiciatis doloremque hic totam ipsa repellat sint adipisci in vel molestiae cum possimus, dolorum et maxime, voluptatibus. Corrupti pariatur ducimus eos itaque aperiam, unde? Harum obcaecati laudantium numquam, perspiciatis dignissimos soluta. Deserunt, molestias possimus earum, minus nisi accusamus repellat sequi. Dolorum commodi praesentium illo, nihil possimus temporibus ratione ipsa sint.
                  </p>
               </div>
            </div>

            <div class="col-md-12">
               <div class="book-numbers bg-success rounded-circle pl-3 pr-3 font-weight-bold text-white d-inline-block position-absolute">
                  2
               </div>
               <div class="book-detail">
                  <p class="font-weight-light h3">
                     Your booking/purchase details
                  </p>
                  <div class="card bg-transparent border-0 text-secondary font-12">
                     <div class="card-body">
                        <div class="row border-bottom-2 pt-2 pb-2 w-100">
                           <div class="col-md-12">
                              <span class="font-weight-bold"><?= $model->name ?></span>
                           </div>
                        </div>
                        <div class="row border-top-2 pt-2 pb-2 w-100">
                           <div class="col-md-6">
                              <span class="font-weight-bold">Adults</span>
                           </div>
                           <div class="col-md-6 text-right">
                              <span class=""></span>
                           </div>
                        </div>
                        <div class="row border-top-2 pt-2 pb-2 w-100">
                           <div class="col-md-6">
                              <span class="font-weight-bold">Children</span>
                           </div>
                           <div class="col-md-6 text-right">
                              <span class=""></span>
                           </div>
                        </div>
                        <div class="row border-top-2 pt-2 pb-2 w-100">
                           <div class="col-md-6">
                              <span class="font-weight-bold">Date</span>
                           </div>
                           <div class="col-md-6 text-right">
                              <span class=""></span>
                           </div>
                        </div>
                        <div class="row border-top-2 pt-2 pb-2 w-100">
                           <div class="col-md-6">
                              <span class="font-weight-bold">From</span>
                           </div>
                           <div class="col-md-6 text-right">
                              <span class=""><?= $model->location->name ?></span>
                           </div>
                        </div>
                        <div class="row border-top-2 pt-2 pb-2 w-100">
                           <div class="col-md-6">
                              <span class="font-weight-bold">To</span>
                           </div>
                           <div class="col-md-6 text-right">
                              <span class=""><?= $model->locationPickup->name ?></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-4">
         <div class="card">
            <h5 class="card-header bg-secondary text-center text-white h3 font-weight-normal">Thank you!</h5>
            <div class="card-body text-muted">
               <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil eius, porro maiores facilis cumque earum vero repellat tempore dicta minus.
               </p>               
            </div>
         </div>
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