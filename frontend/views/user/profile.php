<?php 

use kartik\rating\StarRating;
$this->title = "Profile";

$user = Yii::$app->user->identity;
$favorite = \frontend\models\Favorite::find()->where(['user_id' => $user->id])->all();

$booked = \frontend\models\TransactionDetails::find()->where(['client_id' => $user->id])->all();

$get = Yii::$app->request->get();

?>

<style>
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
        background-color: #0ea32d;
        color: #fff !important;
    }
</style>

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
                <a class="nav-link text-success <?= !isset($get['favorite']) ? 'active' : '' ?>" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                <a class="nav-link text-success" id="v-pills-book-tab" data-toggle="pill" href="#v-pills-book" role="tab" aria-controls="v-pills-book" aria-selected="false">Booked</a>
                <a class="nav-link text-success <?= isset($get['favorite']) ? 'active' : '' ?>" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Wishlist</a>
            </div>
        </div>
        <div class="col-9">
           <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade <?= !isset($get['favorite']) ? 'show active' : '' ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="<?= $user->first_name ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="<?= $user->last_name ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="<?= $user->email ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" value="<?= $user->username ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade <?= isset($get['favorite']) ? 'show active' : '' ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row">
                        <?php foreach ($favorite as $f): ?>
                            <?php $package = \frontend\models\TouristPackages::findOne($f->package_id); ?>
                            <?php if ($package): ?>
                                <div class="col-md-4 mb-3 rounded">
                                    
                                    <a class="text-dark text-decoration-none" href="/tour/frontend/web/tourist-packages/view?id=<?= $package->id ?>">
                                            
                                        <div class="p-2 rounded-top" style="background-image:url(/tour/frontend/web/<?= $package->image_1 ?>);height:200px;background-position:center;background-repeat: no-repeat;background-size:cover;">

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
                                            <span class="font-weight-bold small"><?= mb_strtoupper($package->name) ?></span>
                                            <span class="small"><?= mb_strtoupper($package->type->name) ?></span>
                                            <a href="/tour/frontend/web/tourist-packages/delete-favorite?id=<?= $f->id ?>"><span class="float-right text-muted"><i class="fas fa-heart text-danger"></i></span></a>
                                            <p>
                                                <?= StarRating::widget([
                                                    'name' => 'star_rating--',
                                                    'value' => $package->rating,
                                                    'pluginOptions' => [
                                                        'displayOnly' => true,
                                                        'theme' => 'krajee-uni',
                                                        'filledStar' => '<i class="fas fa-star"></i>',
                                                        'emptyStar' => '<i class="far fa-star"></i>',
                                                        ]
                                                    ]);
                                                 ?> 
                                            </p>
                                        </div>

                                    </a>

                                </div>   
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-book" role="tabpanel" aria-labelledby="v-pills-book-tab">
                    <div class="row">
                        <?php foreach ($booked as $b): ?>
                            <?php $package = \frontend\models\TouristPackages::findOne($b->package_id); ?>
                            <?php if ($package): ?>
                                <div class="col-md-4 mb-3 rounded">
                                    <a class="text-dark text-decoration-none" href="/tour/frontend/web/tourist-packages/view?id=<?= $package->id ?>">
                                            
                                        <div class="p-2 rounded-top" style="background-image:url(/tour/frontend/web/<?= $package->image_1 ?>);height:200px;background-position:center;background-repeat: no-repeat;background-size:cover;">

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
                                            <span class="font-weight-bold small"><?= mb_strtoupper($package->name) ?></span>
                                            <span class="small"><?= mb_strtoupper($package->type->name) ?></span>
                                            <a href="#"><span class="float-right text-muted"><i class="fas fa-heart text-danger"></i></span></a>
                                            <p>
                                                <?= StarRating::widget([
                                                    'name' => 'star_rating--',
                                                    'value' => $package->rating,
                                                    'pluginOptions' => [
                                                        'displayOnly' => true,
                                                        'theme' => 'krajee-uni',
                                                        'filledStar' => '<i class="fas fa-star"></i>',
                                                        'emptyStar' => '<i class="far fa-star"></i>',
                                                        ]
                                                    ]);
                                                 ?> 
                                            </p>
                                        </div>

                                    </a>

                                </div>   
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
           </div>
           <div class="jumbotron bg-transparent"></div>
        </div>
   </div>
</div>


