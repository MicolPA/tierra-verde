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

<?php $form = ActiveForm::begin(); ?>
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
                        <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>
                     </div>
                     <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-md-12">
               <div class="book-numbers bg-success rounded-circle pl-3 pr-3 font-weight-bold text-white d-inline-block position-absolute">
                  2
               </div>
               <div class="book-detail">
                  <p class="font-weight-light h3 mb-4">
                     Payment Information
                  </p>

                  <div class="col-md-12"  id="smart-button-container">
                     <div id="paypal-button-container"></div>
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

<script src="https://www.paypal.com/sdk/js?client-id=AdRkZ7gVMeRR-QGPq55-0v3XNgvuUfv2W52mSOAWRzjXIcxq6WH0XFFn8bWdwyGMWXDHJG_n0SBGjbfF&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"DOCUMENTO DEBIDA DILIGENCIA","amount":{"currency_code":"USD","value":<?= $price ?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {

            $.ajax({
              url: "/frontend/web/tourist-packages/save-transaction",
              type: 'GET',
              dataType: 'json',
              data: {
                  data: details,
                  payer: details.payer,
                  transactions: details.transactions,
                  package_id: <?= $model->id ?>,
                  amount: <?= $price ?>,
                  _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
              },
              success: function (data) {
                  console.log(data);
                  console.log('success');
                  window.location = '/frontend/web/tourist-packages/payment-success?id='+<?= $model->id ?>;
              }, error: function (xhr, ajaxOptions, thrownError){
               console.log(data);
               swal ( "Error" ,  "El pago no se ha podido completar correctamente" ,  "error");
               console.log(thrownError);
                console.log(xhr);
                console.log(ajaxOptions);
              }
          });

            console.log(details);
            // alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          swal ( "Error" ,  "El pago no se ha podido completar correctamente" ,  "error");
          // window.location = '/frontend/web/site/payment-fail?id='+<?= $model->id ?>;
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
