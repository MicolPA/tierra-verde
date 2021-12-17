<?php 

use yii\widgets\ActiveForm;

$model->id = 1;

 ?>

<div class="jumbotron mb-0 text-center bg-transparent bg-image position-relative divbackground pt-5 pb-5" id='fondo' style="background-image:url(/frontend/web/images/stock-4.jpg);">
    <div class="align-middle h-100" style="padding-top: 10rem;">
       <h1 class="display-4 text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">PLACE YOUR ORDER</h1>
        <p class="lead text-white mb-4 position-relative">YOUR DETAILS</p>
    </div>
</div>
<div class="bg-white pt-2 pb-2 mb-5">
   <div class="container">
      <p class="mb-0">Home > Category > Place your order</p>
   </div>
</div>

<?php $form = ActiveForm::begin(['method' => 'GET']); ?>
<div class="container">
   
   <div class="row mb-4">
      

      <div class="col-md-8">
         <div class="row book-content">
            <div class="col-md-12 w-100 mr-xs-2">
               <div class="book-numbers bg-success rounded-circle pl-3 pr-3 font-weight-bold text-white d-inline-block position-absolute">
                  1
               </div>
               <div class="book-detail mb-4">
                  <p class="font-weight-light h3">
                     Your Details
                  </p>

                  <div class="row">
                     <div class="col-md-6">
                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                     </div>
                     <div class="col-md-6">
                        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                     </div>
                     <div class="col-md-6">
                        <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true])->label("Phone") ?>
                     </div>
                     <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                     </div>

                     <input type="hidden" name="price" value="<?= $price ?>">
                     <input type="hidden" name="package" value="<?= $post['package'] ?>">
                     <input type="hidden" name="children_count" value="<?= $post['children_count'] ?>">
                     <input type="hidden" name="adults_count" value="<?= $post['adults_count'] ?>">
                     <?= $form->field($model, 'user_id')->hiddenInput(['maxlength' => true])->label(false) ?>
                     <?= $form->field($model, 'package_id')->hiddenInput(['maxlength' => true])->label(false) ?>
                     <?= $form->field($model, 'type_id')->hiddenInput(['maxlength' => true])->label(false) ?>
                     <?= $form->field($model, 'pick_up_location_id')->hiddenInput(['maxlength' => true])->label(false) ?>
                     <?= $form->field($model, 'location_id')->hiddenInput(['maxlength' => true])->label(false) ?>
                     <?= $form->field($model, 'kid')->hiddenInput(['maxlength' => true])->label(false) ?>

                  </div>
               </div>
            </div>

            <div class="col-md-12">
               <div class="book-numbers bg-success rounded-circle pl-3 pr-3 font-weight-bold text-white d-inline-block position-absolute">
                  2
               </div>
               <div class="book-detail">
                  <p class="font-weight-light h3 mb-4">
                     Payment Information <input type="submit" value="NEXT" class="btn btn-success ml-2 btn-sm">
                  </p>

                  <div class="col-md-12"  id="smart-button-container">
                     <div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-4">
         <div class="card">
            <h5 class="card-header bg-secondary text-center text-white h3 font-weight-normal">- Summary -</h5>
            <div class="card-body">
               <div class="row border-top pt-2 pb-2 w-100">
                <div class="col-md-6">
                  <label>Adults</label>
                </div>
                <div class="col-md-6 text-right">
                  <label class="adults_amount"><?= $post['adults_count'] ?></label>
                </div>
              </div>
              <div class="row border-top pt-2 pb-2 w-100">
                <div class="col-md-6">
                  <label>Children</label>
                </div>
                <div class="col-md-6 text-right">
                  <label class="adults_amount"><?= $post['children_count'] ?></label>
                </div>
              </div>
               <div class="row border-top pt-2 pb-2 w-100 text-success">
                  <div class="col-md-6">
                    <label class="font-weight-bold h4">Total Cost</label>
                  </div>
                  <div class="col-md-6 text-right">
                    <label class="amount font-weight-bold h4">$<?= number_format($price, 2) ?></label>
                  </div>
              </div>
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
<?php ActiveForm::end(); ?>

