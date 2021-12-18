<div class="jumbotron text-left bg-transparent bg-image-bottom bg-image position-relative divbackground pt-5 pb-1" id='fondo' style="background-image:url(/tour/frontend/web/images/stock-3.jpg);">
    <div class="container">
        <div class="align-middle h-100" style="padding-top: 13rem;">
            <h1 class="display-4 text-uppercase text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">
                <?= $model->first_name . " " . $model->last_name ?>
            </h1>
            <p class="lead text-white mb-4 position-relative small"><i class="fas fa-user mr-2"></i> USER PROFILE</p>
        </div>
    </div>
</div>

<div class="container">
   <div class="row">
     <div class="col-3">
       <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
         <a class="nav-link bg-success text-white" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
         <a class="nav-link text-success" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Wishlist</a>
       </div>
     </div>
     <div class="col-9">
       <div class="tab-content" id="v-pills-tabContent">
         <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="jumbotron bg-transparent mb-5 mt-5"></div>
            <div class="jumbotron bg-transparent mb-5 mt-5"></div>
         </div>
         <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
       </div>
     </div>
   </div>
</div>


